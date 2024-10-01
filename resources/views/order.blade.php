<x-layout>
    <x-slot:css>
        <link rel="stylesheet" href="css/contact.css">
    </x-slot:css>
    <x-slot:main>
        {{-- a4f9ff50-3dbf-4d09-8978-fb04c486d609 --}}
        <div class="container" id="container_">
            <div class="form_container">
                <div class="form">
                    <div class="contact-info">
                        <h3 class="title">Köszönöm bizalmad!</h3>
                        <p class="text">
                            Miután kitöltötted a szükséges mezőket a küldés gombbal a kosaradban lévő termékeket
                            megkapom és amint tudok felkereslek a részletekkel kapcsolatban, ha még ez előtt van
                            megjegyzésed kérlek írd az üzenet mezőbe
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
                    </div>

                    <div class="contact-form">
                        <span class="circle one"></span>
                        <span class="circle two"></span>
                      
                        <form action="https://api.web3forms.com/submit" method="POST">
                            <input type="hidden" name="subject" value="teszt">
                            <input type="hidden" name="from_name" value="Epoxy">
                            <input type="hidden" name="access_key" value="a4f9ff50-3dbf-4d09-8978-fb04c486d609">
                            <input type="hidden" name="redirect" value="https://krisztiepoxymuhelye.com/thankYouPage.html">
                            
                            <div class="input-container">
                                <input type="text" name="Név" id="name" class="input" required autocomplete="name"/>
                                <label for="name">Név</label>
                                <span>Név</span>
                            </div>
                            
                            <div class="input-container">
                                <input type="email" name="Email" id="email" class="input" required autocomplete="email"/>
                                <label for="email">Email</label>
                                <span>Email</span>
                            </div>
                            
                            <div class="input-container">
                                <input type="tel" name="Telefonszám" id="phone" class="input" required autocomplete="tel"/>
                                <label for="phone">Telefonszám</label>
                                <span>Telefonszám</span>
                            </div>
                            
                            <div class="input-container textarea-hidden d-none">
                                <textarea name="Termékek" class="input product-input product-listt" id="product-message"></textarea>
                                <label for="product-message"></label>
                            </div>
                            
                            <div class="input-container textarea">
                                <textarea name="Üzenet" class="input" id="user-message" required></textarea>
                                <label for="user-message">Üzenet</label>
                                <span>Üzenet</span>
                            </div>
                            
                            <div class="checkbox d-flex">
                                <input type="checkbox" name="terms" class="boxx me-1" required>
                                <p>Az <a href="ASZF.html">Általános szerződési feltételeket</a> elolvastam, megértettem és elfogadom.</p>
                            </div>
                            
                            <div class="checkbox d-flex">
                                <input type="checkbox" name="data_policy" class="boxx me-1" required>
                                <p>Az <a href="Adatkezelesi-tajekoztato.html">Adatkezelési tájékoztatót</a> elolvastam, megértettem és elfogadom.</p>
                            </div>
                            
                            <button type="submit" value="Send" class="btn btnn order-btn" onclick="clearBasket()">Küldés</button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </x-slot:main>
    <x-slot:javaScript>
        <script src="js/order.js"></script>
        <script src="js/contact.js"></script>
    </x-slot:javaScript>
</x-layout>
