# 📚 Guia d'Estudi: Cookies en PHP des de Zero
*Basat en el Mòdul 7 (Xavier Lara - Institut TIC de Barcelona) i orientat als exercicis pràctics.*

---

## 1. Què és una Cookie en el món real? (L'Analogia)

Imagina que vas al metge o al guarda-roba d'un teatre:
1. El protocol web (**HTTP**) pateix d'**amnèsia**: cada vegada que fas clic o entres a una pàgina, el servidor web no sap qui ets, ni si acabes d'entrar fa 5 segons o és la primera vegada a la teva vida.
2. Per solucionar aquesta manca de memòria, el servidor et diu: *"Té aquest paperet amb el número 42 escrit, guarda-te'l a la butxaca"* (**Crear la cookie**).
3. La propera vegada que demanes una pàgina, el teu navegador li ensenya automàticament el paperet al servidor: *"Hola, porto aquest paperet que em vas donar"* (**Llegir la cookie**).

> **Definició tècnica:** Una cookie és un **petit fitxer de text** que el servidor demana al **navegador del client** que emmagatzemi al seu ordinador per recordar paràmetres i preferències entre visites.

---

## 2. Diferència Clau: Cookie vs Sessió

Segons les diapositives del Mòdul 7:

| Característica | 🍪 Cookie | 🔐 Sessió |
| :--- | :--- | :--- |
| **On es guarda?** | A l'**ordinador del client** (navegador) | Al **servidor web** (fitxers temporals) |
| **Seguretat** | Baixa (l'usuari pot veure-la, modificar-la o esborrar-la) | Alta (l'usuari només té un ID opac) |
| **Durabilitat** | Pot durar mesos/anys segons data de caducitat | Normalment s'esborra en tancar el navegador |
| **Casos d'ús típics** | Comptador de visites, idioma escollit, moneda, acceptació de termes | Login, contrasenyes, dades privades, pagaments |

---

## 3. Les 3 Eines Bàsiques en PHP

Per resoldre qualsevol exercici de cookies només necessites 3 coses:

### A) Escriure o Actualitzar una Cookie: `setcookie()`
```php
setcookie("nom_variable", "valor", caducitat, ruta);
```
- **Nom:** El nom de la clau (ex: `"contador"` o `"idioma"`).
- **Valor:** El contingut a desar (ex: `"5"` o `"catala"`).
- **Caducitat (opcional):** Temps en segons UNIX (`time() + segons`).
  - Exemple per a 30 dies: `time() + (60 * 60 * 24 * 30)`
  - Si no es posa, la cookie s'elimina en tancar el navegador.
- **Ruta (recomanable):** `"/"` per indicar que està disponible a tota la web.

### B) Comprovar si existeix: `isset()`
Quan un usuari entra per primer cop, la cookie **no existeix**. Sempre cal comprovar-la:
```php
if (isset($_COOKIE['contador'])) {
    // La cookie ja existeix (ja havia accedit abans)
} else {
    // És la primera visita
}
```

### C) Llegir la Cookie: `$_COOKIE`
És l'array superglobal que conté totes les cookies enviades pel navegador:
```php
$idioma_actual = $_COOKIE['idioma'];
```

### D) Esborrar una Cookie:
Es torna a enviar `setcookie` amb una data en el passat:
```php
setcookie("contador", "", time() - 3600, "/");
```

---

## 4. ⚠️ La Regla d'Or (Error típic d'examen)

> **`setcookie()` s'ha d'executar SEMPRE abans d'enviar qualsevol sortida HTML, espai en blanc o instrucció `echo`.**

* **Per què?** Perquè les cookies viatgen a les **capçaleres HTTP** (la part inicial invisible de la resposta del servidor). Si PHP ja ha enviat `<!DOCTYPE html>`, un `<html>` o una línia buida, les capçaleres es tanquen i PHP llançarà l'error:
  `Warning: Cannot modify header information - headers already sent`.

---

## 5. El Retard d'1 Petició (Cicle de Vida)

Un detall fonamental:
1. Quan el teu codi fa `setcookie("contador", 1);`, la instrucció viatja cap al navegador perquè ell la guardi.
2. Per tant, en **aquella mateixa càrrega**, `$_COOKIE['contador']` encara no té el nou valor (perquè `$_COOKIE` reflecteix el que el navegador va enviar **a l'inici** de la petició).
3. **Com es resol?** Utilitzant una variable local de PHP en el mateix script:
```php
<?php
// 1. Llegim o inicialitzem
if (isset($_COOKIE['visites'])) {
    $visites = $_COOKIE['visites'] + 1;
} else {
    $visites = 1;
}

// 2. Guardem la nova dada per a la PROPERA visita
setcookie('visites', $visites, time() + 3600 * 24 * 30, "/");

// 3. Per mostrar a la pantalla ARA MATEIX, fem servir la variable $visites
?>
<h1>Visita número: <?php echo $visites; ?></h1>
```

---

## 6. Com afrontar els 2 Exercicis de la Pràctica

### Exercici 1: `comptador_visites`
- **Requisits:**
  1. Comptar quantes vegades ha accedit l'usuari (incrementant la cookie a cada recàrrega).
  2. Input per introduir codis de descompte + botó de compra.
  3. A la visita 5: Oferir cupó `BOTIGA20` (20% descompte).
  4. A la visita 10: Si **no** ha comprat abans amb descompte, oferir cupó `BOTIGA50` (50% descompte).
- **Estratègia de Cookies:**
  - Cookie `visites`: enter que suma 1 a cada visita.
  - Cookie `ha_comprat_amb_descompte`: valor `"si"` / `"no"` que es guarda quan l'usuari fa clic a comprar amb un cupó vàlid.

---

### Exercici 2: `bodega`
- **Requisits:**
  1. Formulari inicial amb validació HTML:
     - Major d'edat? (Sí / No)
     - Idioma? (Català, Espanyol, Anglès)
     - Moneda? (Euros, Lliures, Dòlars)
  2. Guardar exactament aquestes 3 cookies:
     - `majoredat`
     - `idioma`
     - `moneda`
  3. Lògica de visualització:
     - Si `majoredat != 'si'`: Missatge de bloqueig en l'idioma seleccionat (*"No et podem vendre alcohol si ets menor d'edat"*).
     - Si és major d'edat: Mostrar 2 productes (ex: *Vi Les Terrasses*) traduïts a l'idioma triat i amb el símbol/preu de la moneda escollida (€, £, $).

---

## 7. Com inspeccionar i depurar Cookies al teu Navegador

Quan provis els teus exercicis amb Laragon/Navegador:
1. Obre la pàgina al navegador (ex: `http://localhost/exercicis_cookies/...`).
2. Prem `F12` per obrir les eines de desenvolupador (DevTools).
3. Ves a la pestanya **Application** (en Chrome/Edge) o **Emmagatzematge** (en Firefox).
4. Al menú lateral esquerre, desplega **Cookies** -> selecciona el teu domini (`localhost`).
5. Veuràs el nom de la cookie, el seu valor i quan caduca. Des d'allà pots esborrar-les per provar què passa quan ets un usuari nou!
