# 🌐 Implantació d'Aplicacions Web — Laboratori Pràctic (`implantacioAplicacionsWeb_lab`)

Repositori de lliuraments, pràctiques i projectes del mòdul **Implantació d'Aplicacions Web (IAW)** de 2n curs de C.F.G.S. Administració de Sistemes Informàtics en Xarxa (**ASIX**) a l'**Institut TIC de Barcelona**.

**Autor:** [Bo Hao Zhang](https://github.com/bo-hao-zhang)  
**Centre:** Institut TIC de Barcelona  
**Curs acadèmic:** 2026-2027  

---

## 📁 Estructura del Repositori

```text
implantacioAplicacionsWeb_lab/
├── exercicis_php/                    # Exercicis inicials de sintaxi i formularis PHP
│   ├── ex1/                          # Formulari de contacte (Mètode POST)
│   ├── ex2/                          # Conversor de divises EUR <-> USD (Mètode POST)
│   ├── ex3/                          # Salutació dinàmica segons hora del servidor (hora.php)
│   ├── ex4/                          # Enquesta d'estils musicals amb selecció dinàmica (POST)
│   └── ex5/                          # Calculadora d'IVA segons tipus impositiu (POST)
├── .gitignore                        # Filtre per a fitxers temporals, logs i credencials
└── README.md                         # Documentació general del repositori
```

---

## 🛠️ Bloc 1: Exercicis Fonamentals de PHP (`exercicis_php`)

Col·lecció d'exercicis pràctics orientats a l'aprenentatge de sintaxi bàsica, control de flux, tractament de variables i comunicació client-servidor mitjançant peticions HTTP.

| Directori | Descripció de l'Exercici | Mètode HTTP | Raonament del Mètode |
|---|---|---|---|
| [`ex1/`](exercicis_php/ex1/) | Formulari de contacte amb nom, cognoms, correu i missatge. | `POST` | Viatja al cos del paquet HTTP, protegint informació personal i sense limitació de mida de text. |
| [`ex2/`](exercicis_php/ex2/) | Conversor bidireccional d'Euros (€) i Dòlars ($). | `POST` | Transmet valors financers de forma neta sense alterar la URL de navegació. |
| [`ex3/`](exercicis_php/ex3/) | Salutació condicional dependent de la franja horària del servidor (`date("H")`). | `GET` | Petició idempotent de consulta de recursos sense enviament de dades sensibles. |
| [`ex4/`](exercicis_php/ex4/) | Enquesta d'opinió d'estil musical amb resposta personalitzada. | `POST` | Transmet la selecció de l'usuari preservant l'estat en el costat del servidor. |
| [`ex5/`](exercicis_php/ex5/) | Càlcul de preu base, quota d'IVA (general, reduït, superreduït) i total final. | `POST` | Enviament de dades numèriques de càlcul al controlador de processament. |

---

## ⚙️ Entorn d'Execució i Proves

* **Servidor Web:** Apache 2.4 (Laragon / Entorn de desenvolupament local)
* **Intèrpret:** PHP 8.x
* **Directori arrel web local:** `C:\laragon\www\bohao\`
