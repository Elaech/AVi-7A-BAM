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
	a{
		text-decoration:none;
	}
    p{
        padding-left: 0rem;
    }
	#toc_container {

	margin-bottom: 1em;
	padding: 20px;
	width: auto;
	}
	ol{
		text-decoration:none;
		list-style: none;
	}


</style>

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
											<li><a href="#id5_1_4_2">5.1.4.2 Modele</a></li>
											<li><a href="#id5_1_4_3">5.1.4.3 View-uri</a></li>
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
        </section>

		<!-- Diagrama Arhitecturala -->
        <section id="id4">
			<h2>4. Diagrama Arhitecturala</h2>
			<img src="http://localhost/AVi-7A-BAM/public/Styles/Diagrama%20Arhitecturala.png">
        </section>
		
		<!-- API Servicii -->
        <section id="id5">
			<h2>5. API Servicii</h2>	
			<!-- AVIAUTH -->
			<section id="id5_1">
				<h3>5.1 AVIAUTH</h3>
				<!-- Introducere -->
				<section id="id5_1_1">
					<h4>5.1.1 Introducere</h4>
				</section>
				<!-- Motivatie -->
				<section id="id5_1_2">
					<h4>5.1.2 Motivatie</h4>
				</section>
				<!-- Diagrama Arhitecturala -->
				<section id="id5_1_3">
					<h4>5.1.3 Diagrama Arhitecturala</h4>
				</section>
				<!-- Arhitectura -->
				<section id="id5_1_4">
					<h4>5.1.4 Arhitectura</h4>
					<!-- Controllere -->
					<section id="id5_1_4_1">
						<h5>5.1.4.1 Controllere</h5>
					</section>
					<!-- Modele -->
					<section id="id5_1_4_2">
						<h5>5.1.4.2 Modele</h5>
					</section>
					<!-- View-uri -->
					<section id="id5_1_4_3">
						<h5>5.1.4.3 View-uri</h5>
					</section>
				</section>
				<!-- Functionalitati -->
				<section id="id5_1_5">
					<h4>5.1.5 Functionalitati</h4>
				</section>
				<!-- API REST -->
				<section id="id5_1_6">
					<h4>5.1.6 API REST</h4>
				</section>
				<!-- Tehnologii -->
				<section id="id5_1_7">
					<h4>5.1.7 Tehnologii</h4>
				</section>
				<!-- Concluzii -->
				<section id="id5_1_8">
					<h4>5.1.8 Concluzii</h4>
				</section>
			</section>	
			<!-- AVIACC -->
			<section id="id5_2">
				<h3>5.2 AVIACC</h3>
				<section id="id5_2_1">
					<h4>5.2.1 Introducere</h4>
					<!-- <p>API-ul REST creat de noi, numit AVIACC, este o ... care se ocupa cu manipularea textuala a JSON-ului </p> -->
				</section>
				<!-- Motivatie -->
				<section id="id5_2_2">
					<h4>5.2.2 Motivatie</h4>
				</section>
				<!-- Diagrama Arhitecturala -->
				<section id="id5_2_3">
					<h4>5.2.3 Diagrama Arhitecturala</h4>
				</section>
				<!-- Arhitectura -->
				<section id="id5_2_4">
					<h4>5.2.4 Arhitectura</h4>
					<!-- Controllere -->
					<section id="id5_2_4_1">
						<h5>5.2.4.1 Controllere</h5>
					</section>
					<!-- Modele -->
					<section id="id5_2_4_2">
						<h5>5.2.4.2 Modele</h5>
					</section>
					<!-- View-uri -->
					<section id="id5_2_4_3">
						<h5>5.2.4.3 View-uri</h5>
					</section>
				</section>
				<!-- Functionalitati -->
				<section id="id5_2_5">
					<h4>5.2.5 Functionalitati</h4>
				</section>
				<!-- API REST -->
				<section id="id5_2_6">
					<h4>5.2.6 API REST</h4>
				</section>
				<!-- Tehnologii -->
				<section id="id5_2_7">
					<h4>5.2.7 Tehnologii</h4>
				</section>
				<!-- Concluzii -->
				<section id="id5_2_8">
					<h4>5.2.8 Concluzii</h4>
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
					</section>
					<!-- Functionalitati -->
					<section id="id6_2_1_2">
						<h5>6.2.1.2 Functionalitati</h5>
					</section>
					<!-- Interfata Grafica -->
					<section id="id6_2_1_3">
						<h5>6.2.1.3 Interfata Grafica</h5>
					</section>
					<!-- Servicii -->
					<section id="id6_2_1_4">
						<h5>6.2.1.4 Servicii</h5>
					</section>
					<!-- Tehnologii -->
					<section id="id6_2_1_5">
						<h5>6.2.1.5 Tehnologii</h5>
					</section>
					<!-- Concluzii -->
					<section id="id6_2_1_6">
						<h5>6.2.1.6 Concluzii</h5>
					</section>
				</section>
				<!-- SERVER -->
				<section id="id6_2_2">
					<h4>6.2.2 SERVER</h4>
					<!-- Introducere -->
					<section id="id6_2_2_1">
						<h5>6.2.2.1 Introducere</h5>
					</section>
					<!-- Arhitectura -->
					<section id="id6_2_2_2">
						<h5>6.2.2.2 Arhitectura</h5>
						<!-- Controllere -->
						<section id="id6_2_2_2_1">
							<h6>6.2.2.2.1 Controllere</h6>
						</section>
						<!-- Modele -->
						<section id="id6_2_2_2_2">
							<h6>6.2.2.2.2 Modele</h6>
						</section>
						<!-- View-uri -->
						<section id="id6_2_2_2_3">
							<h6>6.2.2.2.3 View-uri</h6>
						</section>
					</section>
					<!-- Functionalitati -->
					<section id="id6_2_2_3">
						<h5>6.2.2.3 Functionalitati</h5>
					</section>
					<!-- Servicii -->
					<section id="id6_2_2_4">
						<h5>6.2.2.4 Servicii</h5>
					</section>
					<!-- Tehnologii -->
					<section id="id6_2_2_5">
						<h5>6.2.2.5 Tehnologii</h5>
					</section>
					<!-- Concluzii -->
					<section id="id6_2_2_6">
						<h5>6.2.2.6 Concluzii</h5>
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
			<img src="http://localhost/AVi-7A-BAM/public/Styles/statistics.png">
			<h4>Diagrama Use Case pentru Download</h4>
			<img src="http://localhost/AVi-7A-BAM/public/Styles/download.png">
        </section>
		<!-- Metodologie de management a activitatii -->
        <section id="id8">
			<h2>8. Metodologie de management a activitatii</h2>
        </section>
		<!-- Posibile Imbunatatiri -->
        <section id="id9">
			<h2>9. Posibile Imbunatatiri</h2>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ca orice alta aplicatie din ziua de azi, aplicatia noastra Web Crash Watch are in constanta nevoie de imbunatatiri. 
				
			<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cateva imbunatatiri care ar fi putut fi avute in vedere in cazul in care permitea timpul alocat proiectului ar fi fost 
				organizarea intr-o arhitectura mai bine definita a codului aplicatiei: Chiar daca respectam cu strictete o arhitectura MVC iar codul de pe 
				Back-End este foarte bine structurat, in ceea ce priveste Clientul, in special pe pagina de statistici, se putea pune la punct o arhitectura mai bine definita
				de organizare a functiilor de javascript care au fost scrise.
			<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; O alta imbunatatire ar fi incercarea de economisire a spatiului: in local storage ocupam cateva zeci bune de kilobytes atunci cand apelam vizualizatorul de statistici.
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
        </section>
	</article>
</body>
