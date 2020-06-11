<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
	<link rel="icon" href="http://localhost/AVi-7A-BAM/public/Styles/logo-icon.png" type="image/gif">
    <title>AVI Documentation</title>
	<link rel="stylesheet" href="http://localhost/AVi-7A-BAM/public/Styles/documentation.css">
</head>


<body>
    <article>
        <header>
            <h1>Documentatie AVI</h1>
        </header>
		<!-- Table of Contents -->
		<section>
			<h2 >Cuprins</h2>
			<div  role="contentinfo">
				<ol role = "directory">
					<li><a href="#id1">1. Introducere</a></li>
					<li><a href="#id2">2. Motivatie</a></li>
					<li><a href="#id3">3. Arhitectura</a></li>
					<li><a href="#id4">4. Diagrama Arhitecturala</a></li>
					<li>
						<a href="#id5">5. API Servicii</a>
						<ol role="directory">
							<li>
								<a href="#id5_1">5.1 AVIAUTH</a>
								<ol role="directory">
									<li><a href="#id5_1_1">5.1.1 Introducere</a></li>
									<li><a href="#id5_1_2">5.1.2 Motivatie</a></li>
									<li><a href="#id5_1_3">5.1.3 Diagrama Arhitecturala</a></li>
									<li>
										<a href="#id5_1_4">5.1.4 Arhitectura</a>
										<ol>
											<li><a href="#id5_1_4_1">5.1.4.1 Controllere</a></li>
										</ol>
									</li>
									<li><a href="#id5_1_5">5.1.5 Functionalitati</a></li>
									<li><a href="#id5_1_6">5.1.6 API REST</a></li>
									<li><a href="#id5_1_7">5.1.7 Tehnologii</a></li>
									<li><a href="#id5_1_8">5.1.8 Concluzii</a></li>
								</ol>
							</li>
							<li>
								<a href="#id5_1">5.2 AVIACC</a>
								<ol role="directory">
									<li><a href="#id5_2_1">5.2.1 Introducere</a></li>
									<li><a href="#id5_2_2">5.2.2 Motivatie</a></li>
									<li><a href="#id5_2_3">5.2.3 Diagrama Arhitecturala</a></li>
									<li>
										<a href="#id5_2_4">5.2.4 Arhitectura</a>
										<ol>
											<li><a href="#id5_2_4_1">5.2.4.1 Controllere</a></li>
											<li><a href="#id5_2_4_2">5.2.4.2 Modele</a></li>
											<li><a href="#id5_2_4_3">5.2.4.3 View-uri</a></li>
										</ol>
									</li>
									<li><a href="#id5_2_5">5.2.5 Functionalitati</a></li>
									<li><a href="#id5_2_6">5.2.6 API REST</a></li>
									<li><a href="#id5_2_7">5.2.7 Tehnologii</a></li>
									<li><a href="#id5_2_8">5.2.8 Concluzii</a></li>
								</ol>
							</li>
						</ol>
					</li>
					<li>
						<a href="#id6">6. Aplicatie</a>
						<ol role="directory">
							<li><a href="#id6_1">6.1 Introducere</a>
							</li>
							<li>
								<a href="#id6_2">6.2 AVIBAM</a>
								<ol role="directory">
									<li>
										<a href="#id6_2_1">6.2.1 Client</a>
										<ol role="directory">
											<li><a href="#id6_2_1_1">6.2.1.1 Introducere</a></li>
											<li><a href="#id6_2_1_2">6.2.1.2 Functionalitati</a></li>
											<li><a href="#id6_2_1_3">6.2.1.3 Interfata Grafica</a></li>
											<li><a href="#id6_2_1_4">6.2.1.4 Servicii</a></li>
											<li><a href="#id6_2_1_5">6.2.1.5 Tehnologii</a></li>
											<li><a href="#id6_2_1_6">6.2.1.6 Concluzii</a></li>
										</ol>
									</li>
									<li>
										<a href="#id6_2_1">6.2.2 SERVER</a>
										<ol role="directory">
											<li><a href="#id6_2_2_1">6.2.2.1 Introducere</a></li>
											<li>
												<a href="#id6_2_2_2">6.2.2.2 Arhitectura</a>
												<ol role="directory">
													<li><a href="#id6_2_2_2_1">6.2.2.2.1 Controllere</a></li>
													<li><a href="#id6_2_2_2_2">6.2.2.2.2 Modele</a></li>
													<li><a href="#id6_2_2_2_3">6.2.2.2.3 View-uri</a></li>
												</ol>
											</li>
											<li><a href="#id6_2_2_3">6.2.2.3 Functionalitati</a></li>
											<li><a href="#id6_2_2_4">6.2.2.4 Servicii</a></li>
											<li><a href="#id6_2_2_5">6.2.2.5 Tehnologii</a></li>
											<li><a href="#id6_2_2_6">6.2.2.6 Concluzii</a></li>
										</ol>
									</li>
								</ol>
							</li>
						</ol>
					</li>
					<li><a href="#id7">7. Diagrame Use Case</a></li>
					<li><a href="#id8">8. Metodologie de management a activitatii</a></li>
					<li><a href="#id9">9. Posibile Imbunatatiri</a></li>
					<li><a href="#id10">10. Concluzii</a></li>
					<li><a href="#id11">11. Bibliografie</a></li>
				</ol>
				<!-- Autori & Coordonatori -->
				<dl>
					<dt>Autori</dt>
					<dd>Bogdan Cretu</dd>
					<dd>Andra Ionita</dd>
					<dd>Mihai Minut</dd>
					<dt>Profesori Coordonatori</dt>
					<dd>Andrei Panu - Seminar</dd>
					<dd>Sabin-Corneliu Buraga - Curs</dd>
				</dl>
			</div>
		</section>
		
		<!-- Introducere -->
        <section id="id1">
			<h2>1. Introducere</h2>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Crash Watch este o aplicatie Web care se ocupa de crearea unui mediu de observare a statsticilor bazate pe accidentele din Statele Unite ale Americii in scopul observarii, si de ce nu, constientizarii acestora. 
				<br><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aplicatia noastra ajuta oamenii sa isi formeze o idee asupra numarului de accidente care se petrec in US, sa observe zonele periculoase unde se petrec cele mai multe accidente si nu numai, toate in scopul maturizarii in ceea ce priveste prudenta in trafic.
				<br><br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aplicatia Crash Watch vine cu un sistem de autentificare: creare cont si autentificare in aplicatie. Abia dupa autentificarea in aplicatie un client poate cauta statistici pe baza unor filtre alese de acesta si mai apoi poate vizualiza in 5 moduri diferite statisticile dorite: tabel, graf, harta, grafic de bare si grafic de proportii.
			</p>
        </section> 
		<!-- Motivatie -->
        <section id="id2"> 
			<h2>2. Motivatie</h2>	
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tot mai multe accidente se intampla in fiecare zi, ora sau minut. Ca sofer prudent ti-ar placea sa stii arterele de drum periculoase. Pentru asta exista o astfel de aplicatie. Aplicatia CrashWatch este un observator pentru tot ceea ce inseamna accidente in Statele Unite ale Americii. Cu ajutorul celor 5 moduri de vizualizare se poate realiza cea mai buna perspectiva in ceea ce priveste zonele sigure din Statele Unite ale Americii si, de ce nu, chiar importanta prudentei in ceea ce inseamna sofatul.
				<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Am ales acest proiect dintre toate deoarece urma sa spuna un crud adevar care, speram noi, va trage un semnal de alarma in ceea ce priveste numarul de accidente pe care urmeaza sa il gestionam mai departe in aplicatie.
			</p>	
        </section>
		
		
        
        <!-- Arhitectura -->
        <section id="id3">
			<h2>3. Arhitectura</h2>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Arhitectura aplicatiei AVI este formata din mai multe servicii la care apeleaza o aplicatie principala ce construieste pe baza acestora
				 si a unei logici interne un client ce reda o interfata grafica pentru lucrul cu utilizatorul uman. Cu ajutorul acestei interfete utilizatorul
				 poate sa isi creeze si gestioneze propriul cont in aplicatiei, iar cu ajutorul contului acesta poate accesa tot prin intermediul interfetei
				 datele despre accidente in diferite formate sau poate creea anumite statistici asupra datelor.
			</p>
			<p>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AVIAUTH este o aplicatie dezvoltata in timpul proiectului. Aceasta ofera o modalitate de autentificare a utilizatorilor
			conferita cu ajutorul unui API REST. Functionalitatile oferite sunt cele de creare cont, autentificare, schimbare date, verificare date si delogare. Toate acestea
			pot fi accesate prin intermediul unui token ce este obtinut in urma apelului de logare al API-ului. In urma oricarei interactiuni cu userul aplicatia principala apeleaza la acest
			serviciul pentru a verifica autenticitatea userului ce interactioneaza.
			</p>
			<p>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AVIACC, la fel, reprezinta o aplicatie dezvoltata in timpul proiectului. Aceasta ofera o modalitate simpla de a obtine datele despre accidente in diferite formate
			permitand construirea usoara de statistici asupra lor. Functionalitatile acestei aplicatii sunt expuse printr-un API REST si sunt in mare parte folosite de catre aplicatia principala
			pentru a expune datele intr-un mod interactiv.
			</p>
			<p>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Google Charts este un API construit de Google ce permite construirea si readarea datelor sub forma de statistici interactive. Clientul aplicatiei principale apeleaza
			la acest serviciu pentru afisarea mai interactiva a statisticilor.
			</p>
			<p>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AM4MAPS este un API construit de AMCHARTS ce permite construirea si readarea datelor sub forma de statistici cartografice interactive. Clientul aplicatiei principale apeleaza
			la acest serviciu pentru afisarea statisticilor sub forma unei mape geografice.
			</p>
			<p>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AVIBAM este aplicatia principala a proiectului; ea gestioneaza logica din spatele interactiunii cu utilizatorul si apelurile facute catre servicii.
			Serverul aplicatiei se ocupa cu servirea de pagini web, stiluri, imagini si date catre client, insa face si verificari de authenticitate si procura si date despre accidente cand este nevoie.
			Clientul, folosind diferite tehnologii si servicii, reda datele expuse de catre server intr-un mod interactiv ce este insotit de un design simplu si curat. Tot acesta se ocupa si gestioneaza actiunile
			rezultate din urma actiunii cu utilizatorul.
			</p>
        </section>

		<!-- Diagrama Arhitecturala -->
        <section id="id4">
			<h2>4. Diagrama Arhitecturala</h2>
			<img src="http://localhost/AVi-7A-BAM/public/Styles/Diagrama%20Arhitecturala.png">
        </section>
		
		<!-- API Servicii -->
        <section id="id5">
			<h2>5. API Servicii</h2>
			<p>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; In cadrul proiectului am separat serviciile de autentificare si date despre accidente in doua aplicatii separate ce expun fiecare cate un API REST.
			Acest lucru permite scrierea mai ingrijita si mententanta mai usoara a codului in aplicatia principala, ce utilizeaza aceste servicii expuse de cele doua API-uri.
			Arhitectura bazata pe servicii este una din metodele principale de dezvoltare a aplicatiilor web. In continuare vom prezenta in detaliu cele doua servicii dezvoltate in cadrul proiectului.
			</p>
			<!-- AVIAUTH -->
			<section id="id5_1">
				<h3>5.1 AVIAUTH</h3>
				<!-- Introducere -->
				<section id="id5_1_1">
					<h4>5.1.1 Introducere</h4>
					<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AVIAUTH este aplicatia ce expune prin intermediul unui API REST servicii de inregistrare, autentificare si verificare/schimbare de date asupra diferitor
					conturi de utilizator . Serviciile expuse sunt folosite de catre aplicatia pricipala AVIBAM petru a expune o interfata grafica de inregistrare/logare/schimbare data/verificare date pentru fiecare cont
					de utilizator in parte</p>
				</section>
				<!-- Motivatie -->
				<section id="id5_1_2">
					<h4>5.1.2 Motivatie</h4>
					<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;De la inceputul proiectului am decis ca restrictionarea accesului la datele despre accidente este un lucru bun deoarece reduce traficul pe server si ofera un control administrativ asupra
					activitatii desfasurate de catre clienti. Solutia a fost creerea unei aplicatii ce ofera prin intermediul unui API rest servicii de gestionare a conturilor de utilizator.</p>
				</section>
				<!-- Diagrama Arhitecturala -->
				<section id="id5_1_3">
					<h4>5.1.3 Diagrama Arhitecturala</h4>
					<img src="http://localhost/AVi-7A-BAM/public/Styles/AVIAUTHDiagram.png">
				</section>
				<!-- Arhitectura -->
				<section id="id5_1_4">
					<h4>5.1.4 Arhitectura</h4>
					<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Arhitectura aplicatiei AVIAUTH este una bazata pe arhitectura clasica a unui API REST: un controller principal ce se ocupa cu pastrarea
					requestului primit ce decide mai departe ce controller trebuie apelat pentru requestul specific. Fiecare request poate fi de maxim 6 tipuri: creare cont, logare & verificare token, delogare,
					modificare date, obtinere date sau cazul de request invalid. Fiecare din aceste tipuri are cate un controller asociat ce poate apela la serviciile: userdao, cryptografice sau cele de generare/verificare de tokeni.
					</p>
					<!-- Controllere -->
					<section id="id5_1_4_1">
						<h5>5.1.4.1 Controllere</h5>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aplicatia are la baza un controller principal ce gestioneaza ce subcontroller este apelat pentru a gestiona requestul pe baza
						informatiei primite din request. Tot acesta ,dupa procesarea requestului de catre subcontrollerul ales, returneaza un response valid(comform CORS)
						catre solicitant.</p>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Controllerul de creare cont ,la apelare, primeste datele din request si le valideaza avand in vedere ca acesta sa contina
						un nume de cont, o parola, si o adresa de email. Toate cele trei campuri sunt validate comform standardelor: numele contine numai litere si cifre si are minim o lungime de 6 caractere,
						parola trebuie sa contina o litera mare, o litera mica si un numar si sa fie de minim 8 caractere lungime, emailul se verifica de a fi sub forma valida a unui email. Pasul urmator
						este de a cripta numele si email-ul si a hash-ui parola, iar pe urma se verifica unicitatea numelui si parolei in baza de date. Daca datele primite respecta toate
						conditiile atunci se creeaza un cont in baza de date</p>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Controllerul de logare are 2 interactiuni diferite: logarea contului si verificarea tokenului. Prima functionalitate necesita un
							nume,un ip si o parola, acestea sunt criptate/hash-uite folosind serviciile corespunzatoare si se verifica in baza de date: daca sunt gasite atunci se genereaza un nou token ce va fi returnat
							celui ce a facut requestul. Singurul camp validat este cel de IP. A doua functionalitate primeste un token si un IP(ce este validat precum la prima functionalitate), verifica ca tokenul sa fie corect
							si sa contine niste date valide comform bazei de date: verifica ca IP-ul tokenului sa fie identic cu cel nou trimis, verifica ca id-ul de cont din token sa existe in baza de date
							si daca toate verificarile sunt corecte atunci returneaza un token nou pentru acel cont, astfel verificand validitatea user-ului. Daca un token este valid dar nu are date corecte atunci se va trata acest caz
							ca un furt de token si va intoarce un status de eroare celui ce a trimis requestul. Tokenul are datele spuse mai sus dar si un camp de expirare, daca timpul de expirare este depasit la urmatorul request contul in cauza este delogat. 
							De la acest controller inainte orice request ce se face legat de contul logat trebuie sa contina tokenul curent si o adresa IP fie ipv4 sau ipv6.
							pentru a fi validat si pentru a primi un nou token. Astfel se declanseaza un sistem ce permite logarea unui cont pe un singur device ce verifica si IP-ul userului sa fie la fel pe decursul unei sesiune de interactiune
							cu contul.</p>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Controllerul de preluare de date verifica tokenul ca la pasul anterior si cauta in baza de date informatiile userului (inafara de parola) , le decripteaza si i le trimite ca raspuns.</p>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Controllerul de schimbare de date, la fel, verifica tokenul, si mai poate primi un nume sau/si o parola sau/si o adresa de email. Datele extra sunt verificate comform standardelor de creare de cont
						mentionate mai sus, trateaza cazul de nevaliditate individual (parola schimbata poate fi buna si numele de utilizator poate fi invalid in raspunsul final) dupa care schimba datele de cont ce sunt valide in baza de date la acest cont, daca cele in cauza respecta
						si conditia unicitatii (unde este cazul). </p>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Controllerul de logout verifica tokenul si trimite doar un mesaj de succes in cazul tokenului valid. In baza de date se marcheaza utilizatorul ca fiind delogat prin intermediului campului de salt generat pentru tokenul trecut. </p>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Controllerul ce trateaza requesturile eronate, sau ce nu respecate standardele API-ului sau ce nu contin datele necesare doar reda statusul 400. </p>
					</section>
				</section>
				<!-- Functionalitati -->
				<section id="id5_1_5">
					<h4>5.1.5 Functionalitati</h4>
					<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Functionalitatea principala a aplicatiei este de a mentine o legatura intre un utilizator si contul sau pe parcursul unei sesiuni de interactiuni fara a compromite datele acestuia sau a le expune si avand
					in vedere autenticitatea celui ce trimite requestui asupra contului.  Acest lucru se realizeaza prin intermediul controllerului de verificare/logare a unui cont. Incheierea unei sesiuni se face prin a accesarea controllerului de logout.
					</p>
					<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; O alta functionalitate importantanta este cea de creare a unui cont. Aceasta este cea mai bogata in verificari si validari de date, aici se verifica validitatea campurilor si a detaliilor contului pentru a obtine
					ca rezultat un cont cat mai greu de accesat de utilizatori straini fata de acesta. Fara aceasta functionalitate nu se poate realiza nimic in cadrul aplicatiei.</p>
					<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Functionalitati mai putin importante insa totusi foarte utile sunt cele prezentate de controllerele ce permit access la vizualizarea si updatarea datelor din cont, insa si aceste operatiuni
					au incorporate validarea tokenului curent.</p>
				</section>
				<!-- API REST -->
				<section id="id5_1_6">
					<h4>5.1.6 API REST</h4>
					<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Toate functionalitatile prezentate pot fi accesate prin requesturi la API-ul expus la domeniul "http://localhost/AVIAUTH/api/" ce contin headerul de continut plain/text si contin informatiile specifice sub forma de json.
					</p>
					<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pentru a accesa functionalitatea de creare cont se va face request folosind metoda POST la "http://localhost/AVIAUTH/api/create" ce va avea in body un json cu numele, email-ul si parola utilizatorului (username,email,password). </p>
					<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pentru a accesa functionalitatea de logare/verificare cont se va face un request folosind metoda POST la  "http://localhost/AVIAUTH/api/check" ce va avea in body un json cu o adresa api si fie un nume si o parola fie un token (ip,token,username,password).</p>
					<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pentru a accesa functionalitatea de delogare se va face un request folosind metoda PUT la "http://localhost/AVIAUTH/api/logout" ce va contine in body un json cu un token si o adresa ip (ip,token).</p>
					<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pentru a accesa functionalitatea de vizualizare date cont se va face un request folosind metoda GET la "http://localhost/AVIAUTH/api/details" ce va contine in body un json cu un token si o adresa ip (ip,token).</p>
					<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pentru a accesa functionalitatea de schimbare date cont se va face un request folosind metoda PUT la "http://localhost/AVIAUTH/api/update" ce va contine un json in body ce are un ip si un token dar poate avea un nume sau/si o parola sau/si un email pentru a putea schimba unul sau 
					mai multe campuri asociate contului (ip,token,username,password,email).</p>
				</section>
				<!-- Tehnologii -->
				<section id="id5_1_7">
					<h4>5.1.7 Tehnologii</h4>
					<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tehnologiile de baza folosite de catre aplicatie sunt PHP7 (limbajul de programare folosit) ce ofera un mediu prietenos de dezvoltare si OracleDbms ce ofera
						un mediu sigur de storare a datelor intr-un mod eficient peste care se poate aplica metodologia CRUD.
					</p>
					<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pentru managementul lucrului cu librariile externe a fost folosit Composer, o tehnologie ce furnizeaza tehnologiile cu versiunile dorite direct intr-un folder al proiectului.
					</p>
					<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pentru criptarea si decriptarea datelor s-a folosit criptarea AES-abc oferita de catre libraria OPENSSL ce asigura o criptare pe 512 biti folosind o cheie secreta. Datele obtinute 
						prin acest tip de criptare vor fi valori alfanumerice pentru a fi usor de storat si in baza de date.
					</p>
					<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Metoda de hash folosita in hash-uirea sigura a parolelor este metoda oferita de PHP7 pentru tratarea informatiilor sensibible ce aplica o metoda de HASH + SALT. Tot PHP7 ofera o metoda
						simpla de a verifica daca un hash cu o parola obisnuita se potrivesc.
					</p>
					<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pentru a generarea si validarea de tokeni s-a folosit libraria FirebaseJWT ce genereaza tokeni pe baza unei chei secrete ce pot contine diferite tipuri de informatii.
						In cazul aplicatiei noastre un astfel de token contine o adresa IP asociata sesiunii de interactiuni asupra contului, id-ul contului din baza de date cat si un camp ce detine o data de expirare a tokenului ce este setata la 10 minute dupa generare.
					</p>
				</section>
				<!-- Concluzii -->
				<section id="id5_1_8">
					<h4>5.1.8 Concluzii</h4>
					<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lucrul la o aplicatiei ce expune un API ce gestioneaza conturi pentru utilizatori trebuie facut cu mare atentie la securitate si trebuie sa vina cu un sistem de verificare constanta a autenticitatii.
					Aceste lucruri pot fi greu de gestionat din cauza vulnerabilitatilor aplicatiilor web actuale, ce pot proveni de la interceptarea de date, date sensibile criptate cu sisteme de criptare slabe, hash-uri ce nu folosesc metodologia HASH+SALT ce sunt usor
					de spart din cauza rainbow tables dar si din cauza ca aplicatiile web trebuie sa emita putine informatii dar si intr-un mod rapid ceea ce face alegerea unor sisteme criptografice un lucru dificil.
					</p>
					<p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In concluzie lucrul a fost dificil din cauza alegerilor ce au trebuit fi facute pe decursul dezvoltarii, iar lucrurile ce ar putea fi imbunatatite ar fi sistemele de criptare folosite pentru
					a fi executate mai rapid, aceasta avand in vedere ca timpul actual maxim de procesare al unui request+response in cadrul aplicatiei este de 130ms.
					</p>
				</section>
			</section>	
			<!-- AVIACC -->
			<section id="id5_2">
				<h3>5.2 AVIACC</h3>
				<section id="id5_2_1">
					<h4>5.2.1 Introducere</h4>
					 <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AVIACC este un API care se ocupa cu managementul datelor in ceea ce priveste manipularea bazei de date cu accidente.
						Cu ajutorul acestui API manipularea datelor practic devine o joaca. Pe langa faptu ca API-ul se ocupa cu interogarea bazei de date si compunerea raspsului in formatul cerut (json),
						acesta se ocupa si cu crearea interogarii printr-o metoda inovativa care in functie de request-ul trimis trateaza cazurile si compune singur interogarea care urmeaza sa fie folosita pe baza de date.
						
</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;API-ul AVIACC, construit ca un API REST, este usor de folosit si modul in care ofera rezultatele, anume repede si intr-un format usor de manipulat mai departe, pot face aplicatia mai eficienta.
					  </p> 
				</section>
				<!-- Motivatie -->
				<section id="id5_2_2">
					<h4>5.2.2 Motivatie</h4>
					<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Avantajul principal al API-ului AVIACC
					 este acela că oferă mai multă flexibilitate. Prin urmare, se pot efectua mai 
					 multe tipuri de apeluri si se pot returna diferite formate de date in functie de request-ul dat.
					 Motivul implementarii acestuia a venit din pricina celor 50 coloane ale bazei da date cu 3 milioane de linii care trebuiau gestionate.
					 Din cauza ca este inuman scrierea a cate unui caz pentru fiecare coloana si caz de filtrare, a aparut API-ul nostru care destul de putin cod in comparatie cu ce putea sa fie, manipuleaza repede si cum ne-am fi dorit baza de date. 
					 </p>
				</section>
				<section id="id5_2_3">
					<h4>5.2.3 Diagrama Arhitecturala</h4>
					<img src="http://localhost/AVi-7A-BAM/public/Styles/aviacc.png">
				</section>
				<!-- Arhitectura -->
				<section id="id5_2_4">
					<h4>5.2.4 Arhitectura</h4>
					<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ca model arhitectural pentru AVIACC incercam sa respectam pe cat posibil Model-View-Controller,
						 evident fara existenta view-ului. Avem zona de controllers unde tinem controllerele pentru metoda 
						 de preluare a datelor si metoda de eroare, in core tinem conexiunea la baza de date iar in models 
						 tinem entitatea accident cu toate coloanele si metodele sale. 
</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aplicatia ca servicii dao o metoda care furnizeaza rezultatul in functie de request-ul primit si o metoda care creaza interogarea in functie de request-ul primit. 
					</p>
					<!-- Controllere -->
					<section id="id5_2_4_1">
						<h5>5.2.4.1 Controllere</h5>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Controllerele reprezinta nucleul aplicatiei. Acolo este lcul unde se face toata logica. Ele decid in ce cricumstante se aleg anumite modele si mentioneaza si ce serviciu ar trebui modelele sa apeleze mai departe. Acestea comunica si cu exteriorul aplciatiei. In AVIACC sunt doua controllere: unul care verifica existenta datelor si apeleaza metoda de GET si unul care manipuleaza erorile in cazul in care apar. In controller-ul pentru date</p>
					</section>
					<!-- Modele -->
					<section id="id5_2_4_2">
						<h5>5.2.4.2 Modele</h5>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Modelele sunt unitati logice ale aplicatiei care sunt utilizate pentru a oferi datelor o forma si o utilite. Ele sunt utilizate de catre controllere pentru a interpreta datele. In alicatia noastra avem un model care defineste un accident si metodele sale. Acele metode vor apela niste servicii cu anumite inputuri stabilite de model sau impuse de controller. Serviciile pe care le foloseste modelul sunt: serviciul dao care creaza interogarea sub format SQL in functie de datele din json si serviciul dao care se ocupa cu interogarea bazei de date cu selectul creat anterior si crearea rezultatului in format json.</p>
					</section>
				</section>
				<!-- Functionalitati -->
				<section id="id5_2_5">
					<h4>5.2.5 Functionalitati</h4>
					<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aplicatia AVIACC are ca functionalitate principala consumarea unui json primit de la client si furnizarea unui raspuns pe baza acestuia. Modul de functionare este simplu: se parseaza json-ul primit si se salveaza informatiile separate in vectori sau variabile separate; mai apoi aceste variabile sunt trimise la o metoda ce urmareste patternu command care compune string-ul de interogare a bazei de date; aceasta interogare este executata iar informatiile sunt salvate si trimise ca raspun in format json.</p>
					<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Comportamentul aplicatiei difera in functie de entitatea care a trimis request-ul: daca front-end a trimis request se vor furniza cate 20 date in functie de pagina pe care se afla clentul iar daca back-end a trimis requestul se furnizeaza tot numarul de intrari posibile deoarece acele intrari vor fi folosite in cadrul realizarii statisticilor.</p>
				</section>
				<!-- API REST -->
				<section id="id5_2_6">
					<h4>5.2.6 API REST</h4>
					
					<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Functionalitatile acestei aplicatii sunt expuse printr-un API REST. API-ul REST creat de noi, numit AVIACC, se referă la instrumente, servicii sau software care se bazează pe principiul arhitectural REST care ajuta la o mai buna creare a statisticilor si care creste eficienta aplicatiei mari.</p>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In cadrul aplicatiei avem metoda POST care consuma un json. In ciuda faptului ca este stabilita ca fiind POST, functioneaza ca un GET. 
					Am ales acest lucru pentru ca json-ul atat trimis catre a fi consumat cat si primit ca raspuns puteau ajunge la dimensiuni foarte mari care nu erau suportate in orice caz de metoda GET.
					Json-ul trimis la API are un doar un body in timp ce Json-ul primit are pe langa body si un count care spune numarul maxim de inregistrari pentru o mai buna manipulare a datelor in zona de statistici.
				</p>
				</section>
				<!-- Tehnologii -->
				<section id="id5_2_7">
					<h4>5.2.7 Tehnologii</h4>
					<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ca tehnologii pentru crearea API-ului AVIACC am folosit limbajul de programare PHP pentru crearea codului aplicatiei, SQL pentru interogarea bazei de date, PostMan pentru testarea API-ului si verificarea functionalitatilor, Visual Studio ca editor de cod si desigur XAMPP ca web server.</p>
				</section>
				<!-- Concluzii -->
				<section id="id5_2_8">
					<h4>5.2.8 Concluzii</h4>
					<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aplicatia AVIACC este utila, necesara si foarte bine pusa la punct. Este usor de folosit iar rezultatele sunt pe masura. In cazul in care ar aparea nevoia de modificari acestea vor fi usor de facut din cauza arhitecturii foarte bine pusa la punct care urmeaza modelul MVC.  </p>
				</section>
			</section>	
        </section>
		
		<!-- Aplicatie -->
        <section id="id6">
		
			<h2>6. Aplicatie</h2>
			<!-- Introducere -->
			<section id="id6_1">
				<h3>6.1 Introducere</h3>
			</section>
			<!-- AVIBAM -->
			<section id="id6_2"> 
				<h3>6.2 AVIBAM</h3>
				<!-- CLIENT -->
				<section id="id6_2_1">
					<h4>6.2.1 CLIENT</h4>
					<!-- Introducere -->
					<section id="id6_2_1_1">
						<h5>6.2.1.1 Introducere</h5>
						<p>Clientul aplicatiei AVIBAM este un site web care face prezentarea functionalitatilor aplicatiei, precum si legatura dintre client si
						serverul aplicatiei, care ofera prin API-uri restul functionalitatilor.</p>
						<p>Generarea chart-urilor se face din client cu informatiile primite de la server si trimise la API-uri specializate
						in acest lucru.</p>
						
					</section>
					<!-- Functionalitati -->
					<section id="id6_2_1_2">
						<h5>6.2.1.2 Functionalitati</h5>
						<p>Clientul asigura posibilitatea de vizualizare a statisticilor, precum si a datelor despre accidente prin intermediul paginii de statistici,
						aceasta poate fi accesata pentru orice utilizator logat.</p>
						<p>Clientul asigura functionalitatea de creare si accesare cont utilizator pentru client, prin apeluri la api-ul de AVIAUTH, unde se inregistraza cu 
						nume de utilizator, parola, si email.</p>
						<p>Deasemenea exista pagini pentru informatii generale (Home), si informatii de contact(Contact)</p>
						<p>Comportamentul aplicatie difera in functie de statusul clientului, un utilizator 
						logat are acces complet la statisiticile si datele descarcabile disponibile in cadrul aplicatiei. Un utilizator nelogat
						are acces la documantatie , pagina Home si paginca cu date de contact, functionalitatile de logare si creere cont avand
						pagini proprii accesibile da catre ambele tipuri de utilizatori </p>
						<p>Informatiile despre sesiune sunt pastrate prin cookies pentru a permite pastrarea unui utilizator logat
						pentru o perioada mai lunga de timp. Parolele sunt criptate pentru a asigura o cat mai buna integritatea a conturilor utilizatorilor,
						a caror informatii sunt salvate intr-o baza de date de tip Oracle Sql plus.</p>
						<p>Informatiile despre accidente sunt disponibile sub forma de tabel sau diagrame, inclusiv dupa locatia pe garta,
						informatiile sunt transmise si salvate prin intermediul xml si ajax.</p>
						</section>
					<!-- Interfata Grafica -->
					<section id="id6_2_1_3">
						<h5>6.2.1.3 Interfata Grafica</h5>
						<p>Fiecare pagina are 3 elemnte comune, a caror design este pastrat de pe pagina pe pagina, Header-ul, Footer-ul,
						si bara de navigatie, a carei icon-uri au sursa: <a>https://fontawesome.com/icons?d=gallery</a></p>
						<p>Bara de navigatie este verticala, ocupa intreaga inaltime a ecranului, iar prin hover asupra ei apare 
						varianta extinsa, cu numele fiecarei pagini acesibile si avatar-ul color al utilizatorului. Linkurile disponibile 
						difera de la o pagina la alta si in functie de statusul utilizatorului: logat sau nelogat.</p>
						<p>Footer-ul contine informatii de contact, precizarea ca site-ul este un proiect "Web Tehnologies Faculty", 
						iar in partea dreapta Logo-urile GitHub, Trello, Fii, cu functionalitate de link spre paginile corespunzatoare.</p>
				 
						<p>Pagina Home contine inforatii de baza despre site, si ce se poate face cu acesta 
						iar prin bara de navigatie de aici se poate ajunge la : Log In, Create Account, Contact, Documentation.</p>
						 <p>Pagina de Log In, contine o casuta mare, cu titlul Sign In, 
						Are un formulra, cu doua casute copletabile: Username si Password, 
						o optiune de mentinere a utilizatorului logat, cu bifare, un link spre creerea 
						unui cont, si un buton de logare. Pagina de log in are in bara de navigatie 
						paginile : Home, Contact,Statistics, Create Account, Documentation</p>
						 <p>Pagina pentru creerea contului, are un formular cu patru intrari,
						 pentru nume, parolla, confirmare parola si email, un link spre pagina de logare si 
						 un buton de creere a unui nou cont. Din aceasta pagina sunt accesibile prin bara de 
						 navigatie : Account Menu, Home, Contact, Statistics, Documentation</p>
						<p>Pagina de contact va contine 3 elemente: Locatia pe harta a sediului nostru,
						 adresele la care poate fi contactata administratia site-ului, Si un form, "intitulat Write us!"
						 prin intermediul caruia sa poate trimite un email diect din site spre noi.</p>
						 <p>Formularul de contact va contine 3 input-uri: adresa email a clientului,
						 Subiectul email-ului, si Mesajul propriu-zis</p>
						<p>Documantul vizualizat acum esta Documantation</p>
					</section>
					<!-- Servicii -->
					<section id="id6_2_1_4">
						<h5>6.2.1.4 Servicii</h5>
						<p>Serviciile prorii folosite de client sunt Serverul AVIBAM, API-urile AVIACC pentru accidente, AVIAUTH pentru gestionarea conturilor de utilizator
						si a logarii si delogarii utilizatorilor, Google Charts pentru desenarea graficelor statistice, am4map pentru harti.</p>
					</section>
					<!-- Tehnologii -->
					<section id="id6_2_1_5">
						<h5>6.2.1.5 Tehnologii</h5>
						<p>Pentru realizarea clientului am folosit HTML, CSS, pentru formulare, elementele grafice, si aspectul general al paginilor, Javascript pentru 
						functionalitati mai complexe cum este prezentarea datelor cu AJAX pe pagini. Deasemenea sunt folosite mici elemente de php pentru
						imbunatatirea aspectului si responsivitatii site-ului</p>
					</section>
					<!-- Concluzii -->
					<section id="id6_2_1_6">
						<h5>6.2.1.6 Concluzii</h5>
						<p>Clientul AVI este versatil, designul este colorat si vioi, iar functionalitatile si butoanele sunt usor de vazut si accesat.
						Modificarile pot fi facute cu usurinta iar experienta utilizatorului este placuta.</p>
					</section>
				</section>
				<!-- SERVER -->
				<section id="id6_2_2">
					<h4>6.2.2 SERVER</h4>
					<!-- Introducere -->
					<section id="id6_2_2_1">
						<h5>6.2.2.1 Introducere</h5>
						<p>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Serverul aplicatiei AVIBAM este componenta principala ce gestioneaza logica si interactiunea cu clientii. Acesta genereaza pagini interactive cu
							continut html,css si javascript pentru a fi redate clientilor in functie de requesturile facute de acestia si starea in care acestia se afla.
						</p>
					</section>
					<!-- Arhitectura -->
					<section id="id6_2_2_2">
						<h5>6.2.2.2 Arhitectura</h5>
						<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Arhitectura serverului urmareste standardul MVC ce are la baza un sistem de gestionare a serviciilor de care aplicatia are nevoie. 
						Controllerele preiau requestul facut de catre client verifica starea de autentificare a clientului apeland la serviciul conferit de AVIAUTH si in functie de aceasta
						si de eventualele date suplimentare ce sunt cerute de utilizator prin intermediul paginii de statistici, ce sunt procurate prin intermediul serviciului conferit de AVIACC,
						construieste o pagina ce este trimisa ulterior clientului.
						</p>
						<img src="http://localhost/AVi-7A-BAM/public/Styles/AVIBAMDiagrama.png">
						<!-- Controllere -->
						<section id="id6_2_2_2_1">
							<h6>6.2.2.2.1 Controllere</h6>
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Controllerele aplicatiei principale sunt cea mai importanta componenta a proiectului si a rezultatului final, ele rezolvand primii pasi din logica de care este nevoie pentru
							interactiunea cu clientii. Ele constau intr-un controller principal ce primeste requestul clientului si din datele primite decide ce subcontroller trebuie invocat pentru a satiface
							cererea primita prin a apela la diferite servicii si a construi o pagina web ce trebuie trimisa ca raspuns la client.
							</p>
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Controllerele principale sunt in total in numar de sapte, iar logica este ca fiecare controller controleaza ce se intampla pe propria lui pagina ce o are de controlat.
							Paginile web ce pot fi redate sunt: 
							</p>
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Account Menu - reprezinta o pagina,ce nu poate fi accesata decat dupa logare, de gestiune a contului de utilizator iar controllerul acestuia interactioneaza cu inputul utilizatorului si modelul de utilizator pentru a 
							reda sau modifica date.s
							</p>
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact - reprezinta o pagina ce poate fi accesata de utilizatori autentificati dar si de cei neautentificati ce contine detalii despre cum se poate lua legatura cu developerii ce au lucrat la site pentru eventuale inconveniente. 
							Diferenta intre cele doua variante ale paginii este la formularul de trimitere a unui mesaj catre developeri, mai exact campul email nu trebuie completat daca utilizatorul este logat.
							</p>
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Create Account - reprezinta o pagina accesibila numai utilizatorilor nelogati si ofera oportunitatea de creere a unui cont de utilizator nou. Controllerul acestei pagini este responsabil atat de redarea corecta a paginii
							insa si de apelul la usermodel pentru a verifica date si a crea un eventual cont nou. Erorile , daca exista, atribuite unor campuri ce trebuie completate pentru a crea un cont sunt redate utilizatorului in acceasi pagina de catre controller.
							Daca nu exista erori si contul a fost creat cu succes utilizatorul va fi redirectionat catre controllerul ce se ocupa de pagina de login.
							</p>
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login - reprezinta pagina de pe care un utilizator neautentificat se poate loga folosind un cont deja existent. Controllerul se ocupa de gestiunea paginii, a erorilor de validare a inputurilor date de catre utilizator,
							dar si de lucrul cu usermodel pentru a valida eventual contul pe care utilizatorul incearca sa il acceseze. Tot acest controller are atribuit metoda ce delogheaza userul si il promteaza la pagina de start.
							</p>
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home - este pagina principala a aplicatiei in care se regasesc informatii, o introducere si un abstract despre functionalitatile dispuse de catre aplicatie. Aceasta pagina vine in cele doua variante pentru cele doua stari
							ale unui client. Diferenta intre cele doua consta in ce functionalitati pot fi accesate cat si in elementele paginii trimise.
							</p>
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Documentation - este controllerul ce permite ambelor tipuri de utilizatori sa acceseze pagina de documentatie a intregii aplicatii construite (pagina curenta).
							</p>
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Statistics - este controllerul ce reda pagina de statistici doar pentru utilizatorii logati. Acesta este cel mai complex dintre controllere deoarece acceseaza ambele modele ale aplicatiei principale
							pentru a verifica atat autenticitatea clientului cat si a reda datele de care acesta are nevoie pentru a forma diferite tipuri de statistici interactive. Pagina redata de acesta este foarte dinamica din punct de vedere a continutului deoarece
							diferite tipuri de statistici cer diferite legaturi in pagina si/sau legaturi catre API-uri externe.
							</p>
						</section>
						<!-- Modele -->
						<section id="id6_2_2_2_2">
							<h6>6.2.2.2.2 Modele</h6>
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Modelele sunt folosite de catre controllere pentru a obtine, a valida sau a schimba diferite date ce au legatura cu bunul demers al aplicatiei.</p>
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Modelul authmodel se ocupa cu gestionea conturilor de utilizator si apeleaza in layerul de API SERVICE la serviciul AVIAUTH pentru a reusi sa satisfaca toate cererile legate de conturi.
							</p>
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Modelul accmodel se ocupa de gestiunea datelor despre accidente si interactioneaza in layerul de API SERVICE cu serviciul AVIACC pentru a obtine datele propriuzise cerute de catre controller.
							</p>
						</section>
						<!-- View-uri -->
						<section id="id6_2_2_2_3">
							<h6>6.2.2.2.3 View-uri</h6>
							<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;View-urile contin in mare parte cod ce trebuie redat clientului pentru a fi interpretat (html,css,javascript) insa contin si bucati de php ce nu se ocupa de logica ci de redarea anumitor
							informatii primite ulterior din cadrul controllerului. Aceste date pot fi date ce specifica formatul paginii sau ce scripturi ar trebui apelate sau trateaza si pun in pagina mesaje despre erorile sau reusitele
							din cadrul interactiunii cu clientul. Tot aceste bucati de cod de php se ocupa cu linkarea de resurse intre client si server prin intermediul diferitlor URI-uri ce directioneaza catre directorul public din server ce contine diferite resurses</p>
						</section>
					</section>
					<!-- Functionalitati -->
					<section id="id6_2_2_3">
						<h5>6.2.2.3 Functionalitati</h5>
						<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Functionalitatile ce sunt prezentate poti fi impartite in doua mari parti: gestiunea si interactiunea cu contul de utilizator si
						obtinerea de date despre accidente si formatarea lor pentru a putea fi folosite in generarea de statistici interactive.
						</p>
						<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; In contextul contului de utilizator clientul poate beneficia de functionalitati precum creerea unui cont nou, autentificare cu ajutorul
						unui cont deja existent, modificarea unui cont existent, schimbarea datelor unui cont si deautentificare.
						</p>
						<p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Obtinerea datelor despre accidente se poate face sub 4 forme diferite : cartografica,bar,pie,graph iar datele redate sunt formatate
						in forme diferite in functie de fiecare tip de data.
						</p>
					</section>
					<!-- Servicii -->
					<section id="id6_2_2_4">
						<h5>6.2.2.4 Servicii</h5>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Serverul aplicatiei se foloseste de cele doua servicii AVIAUTH si AVIACC ce se regasesc la nivel de servicii in layerul de API SERVICE. Acestea ofera
						aplicatiei oportunitatea de a crea o directa interactiune intre utilizator si sistemul de gestiune de conturi cat si o interactiune mai usoara cu datele despre accidente.</p>
					</section>
					<!-- Tehnologii -->
					<section id="id6_2_2_5">
						<h5>6.2.2.5 Tehnologii</h5>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Serverul aplicatiei AVIBAM este construit in pur PHP7 si se foloseste de functionalitatile provenite din utilizarea
						unui server PHP APACHE pentru a crea o gestiune a fisierelor publice si private.</p>
					</section>
					<!-- Concluzii -->
					<section id="id6_2_2_6">
						<h5>6.2.2.6 Concluzii</h5>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Concluzia pentru aplicatia AVIBAM ce sta in centrul proiectului nostru este ca a fost construita intr-un mod eficient din punct de vedere al timpului
						insa ineficient din punct de vedere al spatiului alocat pentru resurse publice. Un neajuns este si faptul ca in pagina de statistici nu se poate
						estima cat de greu ajuns datele inapoi tinand cont ca acestea sunt intr-un numar foarte mare. O mai buna implementare ar fi fost sa facem obtinerea datelor asincron
						in javascript din client. Posibil un alt neajuns insa netestat in totalitate sunt bresele de securitate ce pot aparea cand se lucreaza cu date ale utilizatorului.</p>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Insa cu toate aceste neajunsuri suntem multumiti de rezultatul final al piesei centrale din proiectul nostru avand in vedere si limita de timp.</p>
					</section>
				</section>
			</section>
        </section>
		<!-- Diagrame Use Case -->
        <section id="id7">
			<h2>7. Diagrame Use Case</h2>
			<h4>Diagrama Use Case pentru Creare cont</h4>
			<img src="http://localhost/AVi-7A-BAM/public/Styles/create.png">
			<h4>Diagrama Use Case pentru Autentificare in cont</h4>
			<img src="http://localhost/AVi-7A-BAM/public/Styles/login.png">
			<h4>Diagrama Use Case pentru Cautare si vizualizare statistici</h4>
			<img class="statistics-image" src="http://localhost/AVi-7A-BAM/public/Styles/statistics.png">
			<h4>Diagrama Use Case pentru Download</h4>
			<img src="http://localhost/AVi-7A-BAM/public/Styles/download.png">
        </section>
		<!-- Metodologie de management a activitatii -->
        <section id="id8">
			<h2>8. Metodologie de management a activitatii</h2>
			<p>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Proiectul a fost conceput avand initial in vedere designul si structura paginilor, codul de backend si cel de javascript fiind facute spre final. Mai jos vom descrie
				fiecare etapa a proiectului si ce contributii au fost facute de fiecare membru pe parcurs in ele.
			</p>
			<section id="id8_1" role="directory">
				<h3>Etapa de organizare de inceput</h3>
				<p>Prima etapa a proiectului a constat in stabilirea mediului de lucru si a unei metode de organizare interna.</p>
				<p>Am creat si facut initializarea unui repository pentru proiect. (Toti)</p>
				<p>Am initializat un spatiu de trello pentru proiect avand ariile necesare pentru back-end, front-end etc. (Toti)</p>
				<p>Am creat un canal de comunicare rapida pe Messenger si Discord. (Toti)</p>
			</section>
			<section id="id8_2"  role="directory">
				<h3>Etapa de brainstorming pentru template-urile paginilor</h3>
				<p>Aceasta etapa a inceput prin stabili anumite elemente comune ce ar trebui sa le aiba paginile si a continuat prin
					creerea unor modele/concepte de pagini sau componente.(se regasesc in OLD/Front End Templates)
				</p>
				<p>
					Template-uri/cocepte realizate de Ionita Andra Paula: Header, Create Account Panel, Sign In Panel, Home Page Panel, Contact Page
				</p>
				<p>
					Template-uri/cocepte realizate de Minut Mihai Dimitrie: Navigation Menu, Account Menu/Info Panel
				</p>
				<p>
					Template-uri/cocepte realizate de Cretu Bogdan-Antonio: Statistics Panel,Filtration Menu Panel, Footer Panel
				</p>
			</section>
			<section id="id8_3"  role="directory">
				<h3>Structura HTML5 a paginilor </h3>
				<p>In aceasta etapa fiecare membru si-a ales din conceptele ulterior facute o multime din care sa creeze structura elementului sub 
					forma de continut HTML5. (se regasesc in OLD/Front End Architecture)</p>
				<p>Pagini/elemente de html facute Ionita Andra Paula: Header, Create Account Panel, Sign In Panel, Home Page Panel</p>
				<p>Pagini/elemente de html facute de Minut Mihai Dimitrie: Filtration Menu Panel,  Contact Page , Footer, Navigation Menu </p>
				<p>Pagini/elemente de html facute de Cretu Bogdan-Antonio: Statistics Page , Account Menu</p>
			</section>
			<section id="id8_4"  role="directory">
				<h3>Etapa de stabilire si intocmire a designului folosind CSS3 si Javascript</h3>
				<p>In aceasta etapa fiecare membru a ales anumite pagini facute ulterior in html si a adaugat fise de stil comform CSS3.(se regasesc in OLD/Front End Design)</p>
				<p>Design creat de Ionita Andra Paula: Creare Logo, SignIn Panel, Create Account Panel, Contact Panel, Name for the site, Header</p>
				<p>Design creat de Minut Mihai Dimitrie: Color Pallete, Statistics Panel, Contact Panel, Footer, Filtration Menu</p>
				<p>Design creat de Cretu Bogdan Antonio: Navigation Bar, Account Info Panel, Alegere SVG </p>
			</section>
			<section  id="id8_5"  role="directory">
				<h3>Etapa de integrare a tututor pieselor create pentru a forma paginile finale din aplicatia principala.</h3>
				<p>In aceasta etapa am ales fiecare anumite pagini ce ar trebui imbinate din elementele create anterior si am inceput integrarea lor(Acestea se pot gasi in Proiect Final/AVIBAM/app/views)</p>
				<p>Pagini imbinate de Ionita Andra Paula: Account Menu, Create Account, Sign In, Home</p>
				<p>Pagini imbinate de Minut Mihai Dimitrie: Contact Page, Statistics Page</p>
				<p>Pagini imbinate de Cretu Bogdan Antonio: Documentation, Account Menu , Manual</p>
				<p>Pe decursul integrarii a fost nevoie la fiecare pagine de o refactorizare de html si css. Fiecare membru a facut aceasta la paginile lui (css-ul rezultat se regaseste
					la Proiect Final/AVIBAM/public/Styles/*.css)
				</p>
			</section>
			<section  id="id8_6"  role="directory">
				<h3>Etapa de stabilire a arhitecturii serverului si a scrierii codului pentru acesta din AVIBAM</h3>
				<p>Am stabilit arhitectura serverului comform MVC si am creat o prima varianta(ce nu este cea finala) de controllere, modele si viewuri folosind PHP (acestea se gasesc in proiectul final/AVIBAM/app/controllers | views | models).</p>
				<p>Parti de cod facute de Ionita Andra Paula: <br> Controllere: Statistics + metoda de obtinere de date
				<br> Modele: Accmodel
				<br> Viewuri: Accmodel,Statistics </p>
				<p>Parti de cod facute de Minut Mihai Dimitrie: <br> Controllere: Account Menu, Contact, Create Account, Sign In ,Metoda de Validare a Datelor pentru Statistici
				<br> Modele: Authmodel
				<br> Viewuri: Accountmenu, Statistics, SignIn, Create Account</p>
				<p>Parti de cod facute de Cretu Bogdan Antonio: <br> Controllere: Documentatie,  Manual
			    <br>Viewuri: Statistics</p>
			</section>
			<section  id="id8_7"  role="directory">
				<h3>Etapa de fragmentare a codului in diferite servicii din AVIBAM</h3>
				<p>Deoarece proiectul trebuie sa aiba o arhitectura bazata pe servicii am separat accidentele si conturile in doua servicii separate fata de aplicatia principala.
					Acestea expun fiecare functionalitatile printr-un API REST.(Acestea se regasesc in Proiect Final/AVIAUTH | AVIACC) </p>
				<p>Contributii aduse de Ionita Andra Paula: AVIACC: setup initial, portare date US-ACCIDENTS, pattern command, imbunatatiri ulterioare, metoda principala pentru fetch la date, prototipuri pentru anumite metode din AVIAUTH</p>
				<p>Contributii aduse de Minut Mihai Dimitrie: AVIAUTH: stabilirea arhitecturii, construire sistem de tokeni utilizator, importarea/folosirea de librarii folosind composer, construirea de servicii criptografice, construirea api-ului REST folosind diferite rute, metode de interactiune cu conturile din BD ,prototipuri pentru anumite metode din AVIACC</p>
				<p>Contributii aduse de Cretu Bogdan Antonio:AVIACC: imbunatari generale, refactorizare controller si participare la metoda ce da fetch la date, prototipuri pentru anumite metode din AVIAUTH</p>
			</section>
			<section id="id8_8"  role="directory">
				<h3>Etapa de refactorizare a codului si adaptarea acestuia la noile servicii</h3>
				<p>In aceasta etapa am creat layerul de API-SERVICE in aplicatia principala in care am abstractizat apelul la noile API-uri redate de serviciile create ulterior.(Se regaseste in Proiect Final/AVIBAM/app/ services | models)</p>
				<p>Contributii Ionita Andra Paula: AVIACC-service, accmodel</p>
				<p>Contributii Minut Mihai Dimitrie: AVIAUTH-service, authmodel</p>
				<p>Contributii Cretu Bogdan Antonio: AVIACC</p>
			</section>
			<section id="id8_9"  role="directory">
				<h3>Etapa de Integrare a serviciilor in aplicatia principala folosind PHP7 si Javascript</h3>
				<p>In aceasta etapa am folosit modele ulterior create pentru a stabili interactiunea intre aplicatia principala si cele doua servicii folosind requesturi de pe server dar si din client.(acestea se regasesc in controllere si viewuri in aplicatia principala)</p>
				<p>Contributii Ionita Andra Paula: integrare AVIACC: redare date in functie de tipul statisticii in controllerul de statistici,construire statistici pe datele primite in php</p>
				<p>Contributii Minut Mihai Dimitrie: integrare AVIAUTH: toate controllerele aplicatiei principale inafara de documentation si manual, si in pagina de account menu folosind AJAX.
					<br> integrare AVIACC: apel AJAX pentru realizarea paginarii tabelului din pagina de statistici, construire statistici pe datele primite in php </p>
				<p>Contributii Cretu Bogdan:construire statistici pe datele primite in php </p>
			</section>
			<section id="id8_10"  role="directory">
				<h3>Etapa de finalizare a clientului folosind Javascript</h3>
				<p>A constat in construirea elementelor finale pentru redarea datelor despre accidente in pagina de statistici.(Acestea se regasesc in proiect final/avibam/app/view/statistics)</p>
				<p>Scripturi facute de Ionita Andra Paula: script ce afiseaza modalul si datele din acesta,script ce apeleaza la un api pentru redarea interactiva a statisticilor, script ce formeaza linkurile de download ale statisticilor</p>
				<p>Scripturi facute de Minut Mihai Dimitrie: paginare si construire tabel date, script ce isi aminteste ulterioara alegere de date, script ce afiseaza modalul si datele din acesta, script de initializare a paginii, script ce preia inputul utilizatorului, script ce apeleaza la un api pentru redarea interactiva a statisticilor, script ce formeaza linkurile de download ale statisticilor si formeaza requestul pentru date.  </p>
				<p>Scripturi facute de Cretu Bogdan Antonio: script ce apeleaza la un api pentru redarea interactiva a statisticilor, script ce formeaza linkurile de download ale statisticilor</p>
			</section>
			<section id="id8_11"  role="directory">
				<h3>Etapa de scriere a documentatiei si a manualului de utilizare pentru toata aplicatia</h3>
				<p>Proiectul propriu-zis fiind terminat am inceput lucrul la documentatie si ghid de utilizare, ce au fost impartite pe bucati pentru fiecare membru. (se regasesc in views in documentation)</p>
				<p>Contributii Ionita Andra Paula: Proiect-Introducere, Proiect-Motivatie, Documentatie AVIACC, Proiect-Diagrame Usecase, Proiect-Possible Improvements, Proiect-Concluzii </p>
				<p>Contributii Minut Mihai Dimitrie: Table of Contents, Proiect-Arhitectura, Proiect-Diagrama_Arhitectura, Proiect-Introducere API Servicii, Documentatie AVIAUTH, Documentatie Server Aplicatie Principala, Proiect-Bibliografie</p>
				<p>Contributii Cretu Bogdan Antonio: Table of Contents, Documentatie Aplicatie Principala Client, Ghid de Utilizare</p>
			</section>
			<section id="id8_12"  role="directory">
				<h3>Etapa de testare si refactorizare finala</h3>
				<p>In aceasta etapa am facut un utltim meeting in care am curatat si refactorizat anumite parti din proiect, am adaugat comentarii cu respectivii autori si am reparat eventualele bugg-uri ce au provenit
					din curatare/refactorizare. Cu totii am participat intr-un mod egal.
				</p>
			</section>
			<section  id="id8_13"  role="directory">
				<h3>Crearea unui videoclip de prezentare</h3>
				<p>Ultima etapa a constat in elaborarea unui videoclip de prezentare ce se poate gasi la: https://youtu.be/vTT9nTApHLs . In acest videoclip prezentam aplicatia web principala construita si interactiunile ce pot avea loc cu ea.</p>
			</section>
        </section>
		<!-- Posibile Imbunatatiri -->
        <section id="id9">
			<h2>9. Posibile Imbunatatiri</h2>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ca orice alta aplicatie din ziua de azi, aplicatia noastra Web Crash Watch are in constanta nevoie de imbunatatiri. 
				
			<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cateva imbunatatiri care ar fi putut fi avute in vedere in cazul in care permitea timpul alocat proiectului ar fi fost 
				organizarea intr-o arhitectura mai bine definita a codului aplicatiei: Chiar daca respectam cu strictete o arhitectura MVC iar codul de pe 
				Back-End este foarte bine structurat, in ceea ce priveste Clientul, in special pe pagina de statistici, se putea pune la punct o arhitectura mai bine definita
				de organizare a functiilor de javascript care au fost scrise.
			<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; O alta imbunatatire ar fi incercarea de economisire a spatiului: in local storage ocupam cativa kilobytes atunci cand apelam vizualizatorul de statistici.
			<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Si nu in ultimul rand, pentru ca niciodata un site sau o aplicatie nu o sa arate 100% perfect, s-ar putea avea in vedere si cateva imbunatatiri pe partea de design al aplicatiei.
			</p>
        </section>
		<!-- Concluzii -->
        <section id="id10">
			<h2>10. Concluzii</h2>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ajunsi la final de proiect ne dam seama de ce am reusit sa cream. Suntem multumiti de rezultatul final.
				Chiar daca imbunatatirile sunt bine venite oricand, aplicatia este functionala din toate punctele de vedere. Ne-ar fi placut sa avem mai mult timp la dispozitie pentru a continua cu aceasta aplicatie, sa o imbunatatim.
				<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Consideram ca aceasta aplicatie este folositoare si speram sa isi atinga scopul, si anume acela de a trage un semnal de alarma in ceea ce priveste numarul ingrijorator de mare de accidente care s-au intamplat pe o perioada atat de scurta in Statele Unite ale Americii.
				Asa cum scrie peste tot, viata are prioritate, iar in trafic prudenta, atentia si, de ce nu, cunoasterea zonelor cu risc ridicat de accidente din drumul cu masina poate salva vieti.
				<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In concluzie, multumim Crash Watch pentru ca ne-a oferit oportunitatea de a lucra in echipa, de a invata unii de la altii si de a crea o aplicatie care speram noi sa fie folositoare.
			</p>
        </section>
		<!-- Bibliografie -->
        <section id="id11">
			<h2>11. Bibliografie</h2>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pe parcursul dezvoltarii proiectului s-au folosit diferite resurse gratis, bucati de cod sau librarii gpl pentru scrierea codului; mai jos sunt listate toate acestea.</p>
			<p>Documetatie PHP - https://www.php.net/docs.php </p>
			<p>Oracle SGBD - https://www.oracle.com/database/</p>
			<p>Tehnologii web - https://profs.info.uaic.ro/~busaco/teach/courses/web/</p>
			<p>XAMPP - https://www.apachefriends.org/</p>
			<p>Arhitectura - https://www.youtube.com/watch?v=OsCTzGASImQ&list=PLfdtiltiRHWGXVHXX09fxXDi-DqInchFD</p>
			<p>Tokeni + Documentatie - https://jwt.io/</p>
			<p>Composer - https://getcomposer.org/</p>
			<p>Iconite - https://fontawesome.com/</p>
			<p>Trello - https://trello.com/</p>
			<p>Github - https://github.com/</p>
			<p>OpenSSL - https://www.openssl.org/</p>
			<p> JS Tutorials - https://www.w3schools.com/js/</p>
			<p> HTML Tutorials - https://www.w3schools.com/html/</p>
			<p> CSS Tutorials - https://www.w3schools.com/css/default.asp</p>
			<p>Google Maps - https://www.google.com/maps</p>
			<p>Google Charts - https://developers.google.com/chart</p>
			<p>AM4MAPS - https://www.amcharts.com/</p>
			<p> OBS - https://obsproject.com/</p>
			<p>Browser - https://www.google.com/intl/ro_ro/chrome/</p>
			<p>Draw.io - https://app.diagrams.net/</p>
			<p>Video Merging - https://www.onlineconverter.com/merge-video</p>
			<p>Video Editing - https://online-video-cutter.com/</p>
        </section>
	</article>
</body>
