<x-layout>
    <x-slot:css>
        <link rel="stylesheet" href="css/contact.css">
    </x-slot:css>
    <x-slot:main>
        <div class="container" id="container_">
            <div class="form_container">
              <div class="form">
                <div class="contact-info">
                  <h3 class="title">Keress bizalommal!</h3>
                  <p class="text">
                    Van valamilyen kérdésed? Ne habozz felvenni velem a kapcsolatot!
                    <br />
                    Célom, hogy segítsek, és válaszoljak minden kérdésedre. Bátran
                    keress engem bármikor!
                  </p>
      
                  <div class="info">
                    <div class="information">
                      <i class="fas fa-map-marker-alt"></i> &nbsp &nbsp
      
                      <p>4243 Téglás, Beck Pál utca 34</p>
                    </div>
                    <div class="information">
                      <i class="fas fa-envelope"></i> &nbsp &nbsp
                      <p>krisztiepoxymuhelye@gmail.com</p>
                    </div>
                    <div class="information">
                      <i class="fas fa-phone"></i>&nbsp&nbsp
                      <p>+36 20 416 64 22</p>
                    </div>
                  </div>
      
                  <div class="social-media">
                    <p>Social media :</p>
                    <div class="social-icons">
                      <a
                        href="https://www.facebook.com/kriszti.epoxy.muhelye"
                        target="_blank"
                      >
                        <i class="fab fa-facebook-f"></i>
                      </a>
                      <!-- <a href="#">
                            <i class="fab fa-instagram"></i>
                          </a> -->
                    </div>
                  </div>
                </div>
      
                <div class="contact-form">
                  <span class="circle one"></span>
                  <span class="circle two"></span>
      
                  <form action="https://api.web3forms.com/submit" method="POST">
                    <input
                      type="hidden"
                      name="subject"
                      value="Üzenet az oldaladról"
                    />
                    <input type="hidden" name="from_name" value="Epoxy" />
                    <input
                      type="hidden"
                      name="access_key"
                      value="a4f9ff50-3dbf-4d09-8978-fb04c486d609"
                    />
                    <input
                      type="hidden"
                      name="redirect"
                      value="https://krisztiepoxymuhelye.com/thankYouPage.html"
                    />
                    <h3 class="title">Üzenj nekem</h3>
                    <div class="input-container">
                      <input type="text" name="name" class="input" required />
                      <label for="">Név</label>
                      <span>Név</span>
                    </div>
                    <div class="input-container">
                      <input type="email" name="email" class="input" required />
                      <label for="">Email</label>
                      <span>Email</span>
                    </div>
                    <div class="input-container">
                      <input type="tel" name="phone" class="input" required />
                      <label for="">Telefonszám</label>
                      <span>Telefonszám</span>
                    </div>
                    <div class="input-container textarea">
                      <textarea name="message" class="input" required></textarea>
                      <label for="">Üzenet</label>
                      <span>Üzenet</span>
                    </div>
                    <div class="checkbox d-flex">
                      <input type="checkbox" class="boxx me-2" required />
                      <p class="fs-custom">Az<a href="ASZF.html">Általános szerződési feltételeket</a> elolvastam, megértettem és elfogadom.</p>
                    </div>
                    <div class="checkbox d-flex ">
                      <input type="checkbox" class="boxx me-2" required />
                      <p class="fs-custom">Az<a href="Adatkezelesi-tajekoztato.html">Adatkezelési tájékoztatót</a> elolvastam, megértettem és elfogadom.</p>
                    </div>
      
                    <button type="submit" value="Send" class="btn">Küldés</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
    </x-slot:main>
    <x-slot:javaScript>
        <script src="js/contact.js"></script>
    </x-slot:javaScript>
</x-layout>