<!DOCTYPE html><html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EVOLUCIONMEDIC S.R.L.</title>  <!-- Bootstrap -->  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  <!-- Google Fonts -->  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href ="styles.css">
   </head>
<body>  <!-- Navbar -->  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">EVOLUCIONMEDIC</a><button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="menu">
    <ul class="navbar-nav ms-auto me-4">
      <li class="nav-item"><a class="nav-link" href="#inicio">Inicio</a></li>
      <li class="nav-item"><a class="nav-link" href="#servicios">Servicios</a></li>
      <li class="nav-item"><a class="nav-link" href="#nosotros">Nosotros</a></li>
      <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
    </ul>

    <button class="btn-primary-custom">Solicitar Información</button>
  </div>
</div>

  </nav>  <!-- Hero -->  <section class="hero" id="inicio">
    <div class="container">
      <div class="row align-items-center"><div class="col-lg-6 mb-5">
      <h1>Innovación Médica y Tecnología</h1>

      <p>
        EVOLUCIONMEDIC S.R.L. brinda soluciones modernas para clínicas,
        hospitales y profesionales de la salud.
      </p>

      <button class="btn-primary-custom me-3">Ver Servicios</button>
      <button class="btn btn-outline-dark rounded-4 px-4 py-3">Contactar</button>
    </div>

    <div class="col-lg-6">
      <div class="hero-card">
        <div class="logo-circle">EM</div>
        <h2>Calidad y Confianza</h2>
        <p>Tecnología médica moderna al servicio de la salud.</p>
      </div>
    </div>

  </div>
</div>

  </section>  <!-- Servicios -->  <section class="py-5" id="servicios">
    <div class="container py-5"><div class="section-title">
    <h2>Nuestros Servicios</h2>
    <p>Soluciones integrales para el área médica.</p>
  </div>

  <div class="row g-4">

    <div class="col-md-4">
      <div class="service-card">
        <div class="service-icon">+</div>
        <h4>Equipamiento Médico</h4>
        <p>Distribución de equipos médicos modernos y especializados.</p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="service-card">
        <div class="service-icon">+</div>
        <h4>Mantenimiento Técnico</h4>
        <p>Soporte y mantenimiento preventivo y correctivo.</p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="service-card">
        <div class="service-icon">+</div>
        <h4>Asesoría Profesional</h4>
        <p>Consultoría especializada para clínicas y hospitales.</p>
      </div>
    </div>

  </div>
</div>

  </section>  <!-- Nosotros -->  <section class="about" id="nosotros">
    <div class="container">
      <div class="row align-items-center"><div class="col-lg-6 mb-5">
      <h2 class="fw-bold mb-4">¿Quiénes Somos?</h2>

      <p>
        Somos una empresa enfocada en brindar soluciones innovadoras
        para el sector salud, garantizando calidad y compromiso.
      </p>
    </div>

    <div class="col-lg-6">
      <div class="about-card">
        <h3 class="mb-4">Nuestra Misión</h3>

        <p>
          Mejorar la calidad de atención médica mediante soluciones
          tecnológicas modernas y accesibles.
        </p>
      </div>
    </div>

  </div>
</div>

  </section>  <!-- Contacto -->  <section class="contact" id="contacto">
    <div class="container"><div class="contact-box">

    <div class="section-title">
      <h2>Contáctanos</h2>
      <p>Estamos listos para ayudarte.</p>
    </div>

    <div class="row g-4">

      <div class="col-md-6">
        <input type="text" class="form-control" placeholder="Nombre">
      </div>

      <div class="col-md-6">
        <input type="email" class="form-control" placeholder="Correo electrónico">
      </div>

      <div class="col-12">
        <textarea class="form-control" rows="6" placeholder="Escribe tu mensaje..."></textarea>
      </div>

      <div class="col-12 text-center">
        <button class="btn-primary-custom">Enviar Mensaje</button>
      </div>

    </div>

  </div>
</div>

  </section>  <!-- Footer -->  <footer>
    <h4>EVOLUCIONMEDIC S.R.L.</h4>
    <p>© 2026 Todos los derechos reservados.</p>
  </footer>  <!-- Bootstrap JS -->  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>  <script>
    // Scroll suave
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });

    // Mensaje demo contacto
    const btn = document.querySelector('.btn-primary-custom');

    btn.addEventListener('click', () => {
      console.log('Botón presionado');
    });
  </script></body>
</html>