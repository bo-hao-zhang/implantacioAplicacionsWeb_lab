# Activitats d'Introducció: Conceptes Generals

1) Els servidors web poden servir contingut dinàmic i estàtic. Saps quina és la diferència. Posa un exemple.

La diferència principal és com s'obté el fitxer abans d'enviar-lo al navegador:

* **Contingut estàtic:** Són fitxers que ja estan guardats tal qual al disc del servidor (com un HTML, una imatge o un full CSS). El servidor simplement els llegeix i els envia al client sense modificar res. Tothom qui entra veu exactament el mateix.
  * *Exemple:* `index.html`, `estils.css` o `logo.png`.

* **Contingut dinàmic:** Es genera al moment en què l'usuari fa la petició. El servidor executa un codi (com PHP o Python), fa consultes a la base de dades si cal, i crea una pàgina a mida per a aquell usuari.
  * *Exemple:* `perfil.php` o `cistella.php` (on cadascú veu el seu propi nom, dades o productes guardats).


2) L’arquitectura Peer-to-Peer és una arquitectura Client-Servidor? Sí/No, raona la teva resposta.

**No.**

En una arquitectura Client-Servidor hi ha una màquina central (el servidor) que té la informació i altres equips (clients) que li demanen coses. Si el servidor cau, ningú pot fer servir el servei.

En canvi, a una xarxa Peer-to-Peer (P2P) no hi ha cap servidor central; tots els equips tenen el mateix paper. Cadascun funciona com a client i com a servidor alhora, compartint fitxers directament entre ells (com a BitTorrent). Si un equip es desconnecta, la xarxa continua funcionant sense problemes.


3) Posa un exemple de IaaS, Paas, SaaS. Què vol dir CaaS? posa un exemple.

* **IaaS (Infrastructure as a Service):** Et lloguen la màquina virtual, l'emmagatzematge i la xarxa, i tu t'encarregues d'instal·lar el sistema operatiu, configurar Apache, PHP i la teva web.
  * *Exemple:* AWS EC2 o Azure Virtual Machines.

* **PaaS (Platform as a Service):** El proveïdor s'encarrega del sistema operatiu i de l'entorn d'execució. Tu només has de pujar el codi de la teva aplicació.
  * *Exemple:* Heroku o AWS Elastic Beanstalk.

* **SaaS (Software as a Service):** És una aplicació ja feta que fas servir directament per internet des del navegador, sense preocupar-te de res tècnic.
  * *Exemple:* Google Drive, Gmail o Moodle.

* **CaaS (Containers as a Service):** Vol dir contenidors com a servei. És una plataforma al núvol per gestionar i desplegar contenidors (com Docker o Kubernetes) sense haver de gestionar directament les màquines virtuals de sota.
  * *Exemple:* AWS ECS (o EKS) i Google Kubernetes Engine (GKE).


4) Què és un CDN? Per a què serveix? Posa exemples d’empreses que ofereixen aquest servei.

Un CDN (*Content Delivery Network*) és una xarxa de servidors repartits per diferents llocs del món que guarden una còpia dels fitxers estàtics d'una web (imatges, CSS, JS).

**Serveix per:**
1. Fer que la web carregui molt més ràpid, ja que et serveix els fitxers des del servidor que estigui més a prop de la teva ubicació.
2. Descarregar de feina el servidor d'origen perquè no s'arribi a col·lapsar.
3. Protegir la web contra atacs que intenten tirar-la a terra (DDoS).

**Exemples d'empreses:** Cloudflare, Akamai, Fastly o Amazon CloudFront.


5) Què és un CGI?

CGI (*Common Gateway Interface*) és un estàndard que permetia al servidor web comunicar-se amb programes externs (fets en Perl, C, Bash, etc.) per poder generar contingut dinàmic.

Quan un usuari feia una petició, el servidor obria aquell programa, li passava les dades, el programa feia els càlculs i li tornava l'HTML al servidor perquè el mostrés al navegador. Com que obrir un procés nou per a cada visita era molt lent i consumia molta memòria, més endavant es va substituir per opcions més ràpides com mòduls integrats o PHP-FPM.


6) A quin port es reben normalment les peticions HTTP?

Al port **80**. (I si la connexió va xifrada amb HTTPS, es fa servir el port **443**).


7) Analitza la pàgina web http://xtec.gencat.cat amb el navegador Firefox. Obre el complement “Web Developer Tools” amb Ctrl+Majus+I (Menú Burguer -> Més eines-> Web Developer Tools). Aneu a l’opció del menú “Xarxa” (Network/Red). Actualitzeu la pàgina.

a) Posa un exemple de petició HTTP i descriu els seus components.

Un exemple típic de petició per carregar la pàgina principal:

```http
GET /ca/inici HTTP/2
Host: xtec.gencat.cat
User-Agent: Mozilla/5.0 ... Firefox/130.0
Accept: text/html,application/xhtml+xml...
Accept-Language: ca,es...
```

* **Mètode:** `GET` (demana un recurs al servidor).
* **Ruta:** `/ca/inici` (el recurs o pàgina que volem veure).
* **Protocol:** `HTTP/2` (la versió del protocol utilitzada).
* **Capçaleres (Headers):** Donen informació extra, com `Host` (la web de destí), `User-Agent` (el navegador i SO que fem servir) o `Accept-Language` (els idiomes que preferim).
* **Cos (Body):** En aquesta petició GET està buit (només porta dades quan enviem un formulari amb POST).

b) Hi ha alguna petició que no sigui GET?

Quan s'obre la pàgina, pràcticament totes les peticions són **GET** per descarregar els fitxers (l'HTML, imatges, CSS i JS). Tot i això, es pot trobar alguna petició **POST** si la pàgina envia estadístiques de rendiment en segon pla (com els beacons d'Akamai) o si interactuem amb algun cercador o formulari.

c) Quants estats de retorn heu trobat diferents? Què vol dir cadascú? Poseu exemples de 200, 302, 304.

Els més habituals que apareixen són:
* **200 (OK):** La petició ha funcionat bé; el servidor ha trobat el fitxer i l'envia. Exemple: la càrrega inicial del document i les imatges.
* **301 / 302 (Redirect):** El recurs s'ha mogut a una altra adreça. Exemple: en posar `http://xtec.gencat.cat` et redirigeix automàticament a la versió HTTPS `https://xtec.gencat.cat/ca/inici`.
* **304 (Not Modified):** El fitxer no ha canviat des de l'última vegada i el navegador fa servir la còpia que ja té a la memòria cau, estalviant temps i dades. Exemple: quan prems F5 per actualitzar, molts fitxers CSS i imatges retornen 304.


8) Analitza la web https://devtools.glitch.me/network/getstarted.html amb el Firefox i el Web Developer Tools. Trobes algun altre *status code* de retorn diferent en aquesta pàgina?

**Sí**, es rep el codi **410 (Gone)** (o 404 Not Found si no es troba).

Aquest codi d'error significa que la pàgina existia abans, però s'ha suprimit de forma permanent del servidor i ja no tornarà a estar disponible. En aquest cas surt perquè la plataforma Glitch ha desactivat l'allotjament d'aquest exercici.
