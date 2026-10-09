# 🌐 Implantació d'Aplicacions Web — Laboratori Pràctic (`implantacioAplicacionsWeb_lab`)

Repositori oficial de pràctiques, lliuraments i projectes per al mòdul professional **0376: Implantació d'Aplicacions Web (IAW)** del 2n curs de C.F.G.S. **Administració de Sistemes Informàtics en Xarxa (ICA0)** a l'**Institut TIC de Barcelona**.

**Estudiant:** [Bo Hao Zhang](https://github.com/bo-hao-zhang)  
**Docent:** Xavier Lara Moreno  
**Centre:** Institut TIC de Barcelona  
**Curs acadèmic:** 2026-2027  

---

## 🎯 Resultats d'Aprenentatge i Ponderacions (Avaluació Oficial)

Segons la **Fitxa d'Inici oficial del mòdul**, per aprovar cal **superar cada RA amb un mínim de 5.0** (i un mínim de 4.0 a cada examen per fer mitjana):

| RA | Descripció | Pes | Contingut associat |
|:---:|---|:---:|---|
| **RA1** | Instal·lació de servidors d'aplicacions web | **9%** | Apache2, MySQL, PHP, configuració de virtual hosts i entorn |
| **RA5** | Programació de documents web (guions de servidor) | **20%** | PHP bàsic, formularis, mètodes GET/POST, control de flux, sessions |
| **RA6** | Accés a bases de dades des de guions de servidor | **15%** | MySQLi, consultes preparades, seguretat i projecte web CRUD |
| **RA4** | Implantació d'aplicacions d'ofimàtica web | **9%** | Integració i administració d'eines web col·laboratives |
| **RA2** | Instal·lació de gestors de continguts (CMS) | **12%** | Desplegament de CMS (WordPress, etc.) i bases de dades |
| **RA3** | Administració de gestors de continguts | **19%** | Perfils d'usuaris, seguretat, còpies de seguretat i extensions |
| **RA7** | Adaptació i personalització de gestors de continguts | **6%** | Modificació de temes, plantilles i aparença |
| **QEM** | Estada a l'empresa / FCT | **10%** | Pràctiques en entorn empresarial |

---

## 📁 Estructura del Repositori

```text
implantacioAplicacionsWeb_lab/
├── conceptes_generals/               # Bloc 0: Fonaments d'arquitectura web i protocols
│   └── 01-02-Activitats_introduccio.md # Activitats d'introducció (estàtic/dinàmic, P2P, Cloud, CDN, CGI, HTTP)
├── exercicis_php/                    # Bloc 1: Sintaxi, formularis i lògica de servidor
│   ├── ex1/ (index.php)              # Formulari de contacte (Mètode POST)
│   ├── ex2/ (index.php)              # Conversor de divises EUR <-> USD (Mètode POST)
│   ├── ex3/ (hora.php, index.php)    # Salutació segons hora del servidor (date('G') - Mètode GET)
│   ├── ex4/ (index.php)              # Enquesta d'estils musicals amb switch-case (Mètode POST)
│   └── ex5/ (index.php)              # Calculadora de preu amb desglossament d'IVA (Mètode POST)
├── .gitignore                        # Filtre per a fitxers temporals de Laragon, logs i claus
└── README.md                         # Documentació tècnica i acadèmica del laboratori
```

---

## 📖 Bloc 0: Conceptes Generals de Servidors Web (`conceptes_generals`)

Documentació teoricopràctica introductòria sobre funcionament de la xarxa i models d'arquitectura web:

* **Fitxer:** [`conceptes_generals/01-02-Activitats_introduccio.md`](conceptes_generals/01-02-Activitats_introduccio.md)
* **Contingut tractat:**
  1. Contingut estàtic vs. dinàmic (diferències i exemples).
  2. Arquitectura Client-Servidor vs. Peer-to-Peer (P2P).
  3. Models al núvol: IaaS, PaaS, SaaS i CaaS amb exemples del món real.
  4. Xarxes CDN (*Content Delivery Network*): funcionament i seguretat DDoS.
  5. Què és un CGI (*Common Gateway Interface*) i evolució cap a PHP-FPM.
  6. Ports estàndard de xarxa per a HTTP (80) i HTTPS (443).
  7. Anàlisi pràctica de peticions HTTP i codis d'estat (200, 301/302, 304) al portal de la XTEC.
  8. Interpretació del codi d'estat `410 Gone` a les eines de desenvolupador de Firefox.

---

## 🛠️ Bloc 1: Exercicis Fonamentals de PHP (`exercicis_php`)

Col·lecció d'activitats pràctiques d'iniciació a la programació del costat del servidor amb PHP:

| Directori | Descripció i Requisits | Mètode | Raonament Tècnic del Mètode |
|---|---|:---:|---|
| [`ex1/`](exercicis_php/ex1/) | Formulari de contacte (nom, cognoms, correu, missatge). | `POST` | Viatja al cos del paquet HTTP, protegint informació personal i sense límit de longitud. |
| [`ex2/`](exercicis_php/ex2/) | Conversor bidireccional d'Euros (€) i Dòlars ($) a taxa 1.08. | `POST` | Càlcul net sense alterar la URL ni deixar paràmetres a la memòria cau del navegador. |
| [`ex3/`](exercicis_php/ex3/) | Salutació condicional dependent de la franja horària (`hora.php`). | `GET` | Petició de consulta directa sense formulari ni enviament de dades d'usuari. |
| [`ex4/`](exercicis_php/ex4/) | Enquesta d'estil musical amb `radio buttons` i estructura `switch`. | `POST` | Transmet la decisió de l'usuari preservant l'estat en el servidor. |
| [`ex5/`](exercicis_php/ex5/) | Càlcul de preu base, quota d'IVA (21%, 10%, 4%) i total final. | `POST` | Transmissió de valors financers numèrics (`floatval`) al controlador de càlcul. |

---

## ⚙️ Entorn d'Execució i Proves

* **Servidor Web:** Apache 2.4 (Entorn Laragon local)
* **Intèrpret:** PHP 8.x
* **Directori arrel web local (DocumentRoot):** `C:\laragon\www\bohao\`
* **Accés local al navegador:**
  - `http://localhost/bohao/ex1/`
  - `http://localhost/bohao/ex2/`
  - `http://localhost/bohao/ex3/hora.php`
  - `http://localhost/bohao/ex3/`
  - `http://localhost/bohao/ex4/`
  - `http://localhost/bohao/ex5/`

---

## 📜 Normes de Treball i Criteris de Lliurament

1. **Raonament GET vs POST:** Tot script que processi formularis ha d'incloure a l'inici el raonament tècnic de l'elecció del mètode HTTP.
2. **Neteja del codi:**
   - Comentaris essencials que justifiquin la lògica clau (sense sobrecàrrega de text).
   - Validació de tipus de dades (`floatval`, `intval`, arrays) i comprovació d'existència (`?? ''`, `isset`).
3. **Puntualitat:** Els lliuraments fora de termini tenen penalització directa sobre la nota del RA corresponent.
4. **Codi segur:** En pràctiques posteriors amb bases de dades es requereix l'ús de consultes preparades (*Prepared Statements*) per prevenir injeccions SQL i contrasenyes xifrades amb `password_hash()`.
