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
        </section> 
		<!-- Motivatie -->
        <section id="id2"> 
			<h2>2. Motivatie</h2>		
        </section>
		
		
        
        <!-- Arhitectura -->
        <section id="id3">
			<h2>3. Arhitectura</h2>		
        </section>

		<!-- Diagrama Arhitecturala -->
        <section id="id4">
			<h2>4. Diagrama Arhitecturala</h2>
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
        </section>
		<!-- Metodologie de management a activitatii -->
        <section id="id8">
			<h2>8. Metodologie de management a activitatii</h2>
        </section>
		<!-- Posibile Imbunatatiri -->
        <section id="id9">
			<h2>9. Posibile Imbunatatiri</h2>
        </section>
		<!-- Concluzii -->
        <section id="id10">
			<h2>10. Concluzii</h2>
        </section>
		<!-- Bibliografie -->
        <section id="id11">
			<h2>11. Bibliografie</h2>
        </section>
	</article>
</body>
