<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
	<link rel="icon" href="http://localhost/AVi-7A-BAM/public/Styles/logo-icon.png" type="image/gif">
    <title>AVI Documentation</title>
</head>

<style>
    body{
        background-color: white;
        padding-left: 20%;
        padding-right: 20%;
        padding-top: 3rem;
    }
    p{
        padding-left: 0rem;
    }
</style>

<body>
    <article>
        <header>
            <h1>AVI Documentation</h1>
        </header>
    
        <section>      
            <h2>Introduction</h2>
                <p>Aceasta este documentatia pentru pagina web dedicata proiectului AVI la Tehnologii Web 2020.</p>
                <p>Link Catre pagina cerintei:</p>
                <a href="http://ns.science.ai/"><p>Cerinta Proiect</p></a> 
                <p>Link Catre pagina cursului:</p>
                <a href="http://ns.science.ai/"><p>Pagina Cursului</p></a>
        </section> 

        <section>      
            <h2>Proiect Avi Tehnologii Web 2020</h2>
                <p>Proiectul Avi consta un site web destinat vizualizarii
                statisticilor accidentelor rutiere din Statele Unite, conforme cu inragistrarile disponibile pe kaggle:</p>
                <a href="http://ns.science.ai/"><p>Accidente Rutiere USA</p></a>
                <p>Proiectul consta intr-un Server Web, construit dupa arhitectura MVC, folosind tehnoligii PHP, CSS, HTML, JAVASCRIPT
                accesibil via web pentru inregistrare utilizatori si vizualizarea statisiticilor generate si informatiilor accidentelor.</p>


        </section> 
        
        <div role="contentinfo">
            <ol role = "directory">
                <a>Sectiunile principale</a>
                <li>Autori</li>
                <li>Design general al aplicatiei</li>
                <li>Pagini accesibile utilizatorului</li>
                <li>MVC, arhitectura</li>
                <li>Servicii web folosite si alte elemente externe folosite</li>
                <li>Detalii Implemmentare, Dificultati</li>
            </ol>
            <dl>
                <dt>Autori</dt>
                <dd>Bogdan Cretu</dd>
                <dd>Andra Ionita</dd>
                <dd>Mihai Minut</dd>
                <dt>Profesori Coordonatori</dt>
                <dd>Panu Andrei - Seminar</dd>
            </dl>
        </div>

        <section>      
            <h2>Design general al aplicatiei</h2>
        
            <section>
                <h3>Tehnologii folosite</h3>
                <ul>
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>PHP</li>
                    <li>Javascript</li>
                    <li>Oracle SQL plus</li>
                    <li>XML</li>
                    <li>AJAX</li>
                    <li>Mozilla Firefox Browser</li>
                    <li>Google Chrome Browser</li>
                    <li>Microsoft Edge Browser</li>
                    <li>Opera Browser</li>
                    <li>Visual Studio Code IDE</li>
                    <li>Data Grip JetBrains IDE</li>
                    <li>XAMPP</li>
                </ul>
            </section>
            <section>
                <h3>Prezentarea aplicatiei</h3>
                    <p>Aplicatia Avi permite intregistrarea utilizatorului cu nume, parola si email precum si pastrarea unei imagini de profil
                    alese de utilizator care sa va afisa in bara de navigare a site-ului.</p>
                    <p>Comportamentul aplicatie difera in functie de statusul clientului, un utilizator 
                    logat are acces complet la statisiticile si datele descarcabile disponibile in cadrul aplicatiei. Un utilizator nelogat
                    are acces la documantatie , pagina Home si paginca cu date de contact, functionalitatile de logare si creere cont avand
                    pagini proprii accesibile da catre ambele tipuri de utilizatori </p>
                    <p>Informatiile despre sesiune sunt pastrate prin cookies pentru a permite pastrarea unui utilizator logat
                    pentru o perioada mai lunga de timp. Parolele sunt criptate pentru a asigura o cat mai buna integritatea a conturilor utilizatorilor,
                    a caror informatii sunt salvate intr-o baza de date de tip Oracle Sql plus.</p>
                    <p>Informatiile despre accidente sunt disponibile sub forma de tabel sau diagrame, inclusiv dupa locatia pe garta,
                    informatiile sunt transmise si salvate prin intermediul xml si ajax.</p>
                    <p></p>
            </section>


            <section>
                <h3>Pagini accesibile utilizatorului</h3>
                    <p>Fiecare pagina are 3 elemnte comune, a caror design este pastrat de pe pagina pe pagina, Header-ul, Footer-ul,
                    si bara de navigatie.</p>
                    <h4>Header</h4>
                        <p>Headerul contine logo-ul si numele site-ului, este situat deasupra orcarui alt continut randat in pagina
                         exceptand bara de navigatie. Logo-ul are si functionalitate de link spre pagina home, pentru accesare rapida 
                         in orice situatie</p>
                        
                    <h4>Bara de Navigatie</h4>
                        <p>Bara de navigatie este verticala, ocupa intreaga inaltime a ecranului, iar prin hover asupra ei apare 
                        varianta extinsa, cu numele fiecarei pagini acesibile si avatar-ul color al utilizatorului. Linkurile disponibile 
                        difera de la o pagina la alta si in functie de statusul utilizatorului: logat sau nelogat.</p>

                    <h4>Footer</h4>
                        <p>Footer-ul contine informatii de contact, precizarea ca site-ul este un proiect "Web Tehnologies Faculty", 
                        iar in partea dreapta Logo-urile GitHub, Trello, Fii, cu functionalitate de link spre paginile corespunzatoare.</p>

                <h3>Pagini accesibile utilizatorului nelogat</h3>
                    <p>Odata ajuns pe site un client va avea statutul de utilizator nelogat, cu acces la urmatoarele pagini, accesibile din 
                    bara de navigatie.</p>
                    <h4>Home</h4>
                        <p>Pagina Home contine inforatii de baza despre site, si ce se poate face cu acesta 
                        iar prin bara de navigatie de aici se poate ajunge la : Log In, Create Account, Contact, Documentation.</p>
                    <h4>Log In</h4>
                        <p>Pagina de Log In, contine o casuta mare, cu titlul Sign In, 
                        Are un formulra, cu doua casute copletabile: Username si Password, 
                        o optiune de mentinere a utilizatorului logat, cu bifare, un link spre creerea 
                        unui cont, si un buton de logare. Pagina de log in are in bara de navigatie 
                        paginile : Home, Contact,Statistics, Create Account, Documentation</p>
                    <h4>Create Account</h4>
                        <p>Pagina pentru creerea contului, are un formular cu patru intrari,
                         pentru nume, parolla, confirmare parola si email, un link spre pagina de logare si 
                         un buton de creere a unui nou cont. Din aceasta pagina sunt accesibile prin bara de 
                         navigatie : Account Menu, Home, Contact, Statistics, Documentation</p>
                    <h4>Contact</h4>
                        <p>Pagina de contact va contine 3 elemente: Locatia pe harta a sediului nostru,
                         adresele la care poate fi contactata administratia site-ului, Si un form, "intitulat Write us!"
                         prin intermediul caruia sa poate trimite un email diect din site spre noi.</p>
                         <p>Formularul de contact va contine 3 input-uri: adresa email a clientului,
                         Subiectul email-ului, si Mesajul propriu-zis</p>
                    <h4>Documentation</h4>
                        <p>Documantul vizualizat acum esta Documantation</p>
                <h3>Pagini accesibile utilizatorului logat</h3>
                    <p>Odata inregistrat si logat pe site un client va avea statutul de utilizator logat,
                     cu acces la urmatoarele pagini, accesibile din bara de navigatie.</p>
                     <h4>Home</h4>
                     <p>Pagina Home contine inforatii de baza despre site, si ce se poate face cu acesta 
                        iar prin bara de navigatie de aici se poate ajunge la : Log In, Create Account, Contact, Documentation.</p>
                    <h4>Log In</h4>
                    <p>Pagina de Log In, contine o casuta mare, cu titlul Sign In, 
                        Are un formulra, cu doua casute copletabile: Username si Password, 
                        o optiune de mentinere a utilizatorului logat, cu bifare, un link spre creerea 
                        unui cont, si un buton de logare. Pagina de log in are in bara de navigatie 
                        paginile : Home, Contact,Statistics, Create Account, Documentation</p>
                        <p>Log In va redirectiona spre Home pentru un utilizator logat.</p>
                    <h4>Create Account</h4>
                        <p>Pagina pentru creerea contului, are un formular cu patru intrari,
                         pentru nume, parolla, confirmare parola si email, un link spre pagina de logare si 
                         un buton de creere a unui nou cont. Din aceasta pagina sunt accesibile prin bara de 
                         navigatie : Account Menu, Home, Contact, Statistics, Documentation</p>
                         <p>Log In va redirectiona spre Home pentru un utilizator logat.</p>
                    <h4>Contact</h4>
                        <p>Pagina de contact va contine 3 elemente: Locatia pe harta a sediului nostru,
                         adresele la care poate fi contactata administratia site-ului, Si un form, "intitulat Write us!"
                         prin intermediul caruia sa poate trimite un email diect din site spre noi.</p>
                         <p>Formularul de contact va contine 3 input-uri: adresa email a clientului,
                         Subiectul email-ului, si Mesajul propriu-zis</p>
                    <h4>Statistics Page</h4>
                        <p>Pagina de statistici are o interfata de selectie a informatiilor despre 
                        accidente precum si optiuni pentru descarcarea sau schimbare metodei de vizualizare a informatiei.</p>
                    <h4>Documentation</h4>
                    <p>Documantul vizualizat acum esta Documantation</p>

            </section>



            <section>
                <h4>MVC, arhitectura</h4>
                    <h3>View-uri</h3>
                    <h3>Controllere</h3>
                    <h3>Modele</h3>
            </section>


            <section>
                <h4>Servicii web folosite si alte elemente externe folosite</h4>
                    <h3>Servicii Google</h3>
                    <h3>Baza de date cu accidente rutiere</h3>
                    <h3>Resurse de studiu</h3>
            </section>


            <section>
                <h4>Detalii Implemmentare, Dificultati, Metodologie de lucru</h4>
                    <h3>Pregatire Set up de lucru</h3>
                    <h3>Front-end</h3>
                    <h3>Back-end</h3>
                    <h3>Tehnologii, implementare</h3>
            </section>
            

        </section> 
            
        



    </article>
</body>
