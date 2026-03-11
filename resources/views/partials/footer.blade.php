<footer class="mt-5" style="background: var(--iesi-yellow);">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-4">
                <h3 class="h5 font-heading">IESI Jujuy</h3>
                <p class="small mb-0">
                    Instituto de Educación Superior Intercultural de Jujuy. Formación superior con identidad cultural y compromiso comunitario.
                </p>
            </div>
            <div class="col-md-4">
                <h4 class="h6 font-heading">Contacto</h4>
                <ul class="list-unstyled small mb-0">
                    <li>San Salvador de Jujuy, Argentina</li>
                    <li>+54 388 000 0000</li>
                    <li>contacto@iesi.edu.ar</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4 class="h6 font-heading">Redes</h4>
                <div class="d-flex gap-3 small">
                    <a href="{{ config('services.iesi.facebook_page_url') }}" target="_blank" rel="noopener" class="text-decoration-none text-dark">Facebook</a>
                    <a href="#" class="text-decoration-none text-dark">Instagram</a>
                    <a href="#" class="text-decoration-none text-dark">YouTube</a>
                </div>
            </div>
        </div>
    </div>
    <div class="py-3 text-center small" style="background: rgba(255,255,255,0.4);">
        © {{ date('Y') }} Instituto de Educación Superior Intercultural de Jujuy.
    </div>
</footer>
