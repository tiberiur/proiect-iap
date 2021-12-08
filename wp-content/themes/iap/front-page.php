<?php get_header() ?>

<?php the_content() ?>

<!-- Contact -->
<div class="section section--contact">
    <div class="container">
        <div class="section-inner">
            <h2 class="section-title">Need Help!</h2>
            <p class="section-intro">Protect yourself and others around you by knowing the facts and taking appropriate precautions. Floow advice provided by your local health authority.</p>
            <img src="<?= get_template_directory_uri()?>/images/img-help.png" />
            <div class="contact">
                <div class="contact-info">
                    <div class="contact-info-item">
                        <svg width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.804 4.255A1.251 1.251 0 0 1 13.06 3h12.549a1.253 1.253 0 0 1 1.255 1.255v7.53a1.255 1.255 0 0 1-1.255 1.255h-10.04c-.194 0-.386.045-.56.132l-3.204 1.603V4.255ZM13.06.49a3.764 3.764 0 0 0-3.764 3.764v12.55a1.253 1.253 0 0 0 1.816 1.122l4.754-2.376h9.743a3.764 3.764 0 0 0 3.764-3.764v-7.53A3.764 3.764 0 0 0 25.608.491H13.059V.489ZM4.274 3A3.764 3.764 0 0 0 .51 6.765v20.078a3.764 3.764 0 0 0 3.764 3.765h13.804a3.764 3.764 0 0 0 3.764-3.765V18.06a1.255 1.255 0 1 0-2.51 0v8.784a1.255 1.255 0 0 1-1.254 1.255H4.274a1.253 1.253 0 0 1-1.254-1.255V6.765A1.253 1.253 0 0 1 4.274 5.51h2.51a1.255 1.255 0 0 0 0-2.51h-2.51Z" fill="#64CF83"/></svg>
                        <p>
                            <strong>Danish GOHEL</strong>
                            <span>(+91) 9157999875</span>
                        </p>
                    </div>
                    <div class="contact-info-item">
                        <svg width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.804 4.255A1.251 1.251 0 0 1 13.06 3h12.549a1.253 1.253 0 0 1 1.255 1.255v7.53a1.255 1.255 0 0 1-1.255 1.255h-10.04c-.194 0-.386.045-.56.132l-3.204 1.603V4.255ZM13.06.49a3.764 3.764 0 0 0-3.764 3.764v12.55a1.253 1.253 0 0 0 1.816 1.122l4.754-2.376h9.743a3.764 3.764 0 0 0 3.764-3.764v-7.53A3.764 3.764 0 0 0 25.608.491H13.059V.489ZM4.274 3A3.764 3.764 0 0 0 .51 6.765v20.078a3.764 3.764 0 0 0 3.764 3.765h13.804a3.764 3.764 0 0 0 3.764-3.765V18.06a1.255 1.255 0 1 0-2.51 0v8.784a1.255 1.255 0 0 1-1.254 1.255H4.274a1.253 1.253 0 0 1-1.254-1.255V6.765A1.253 1.253 0 0 1 4.274 5.51h2.51a1.255 1.255 0 0 0 0-2.51h-2.51Z" fill="#64CF83"/></svg>
                        <p>
                            <strong>Nilesh Sondarva</strong>
                            <span>(+91) 8980530888</span>
                        </p>
                    </div>
                </div>
                <div class="contact-form">
                    <form class="form" action="#">
                        <div class="field">
                            <input name="name" type="text" placeholder="Name">
                        </div>
                        <div class="field">
                            <input name="number" type="text" placeholder="Number">
                        </div>
                        <div class="field">
                            <select name="subject" id="subject">
                                <option value="1">How can i help you</option>
                                <option value="2">Option 1</option>
                                <option value="3">Option 2</option>
                            </select>
                        </div>
                        <div class="field">
                            <textarea name="message" id="message">How can i help you</textarea>
                        </div>
                        <button class="button-secondary"><span>Click to send</span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>