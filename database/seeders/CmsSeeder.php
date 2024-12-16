<?php

namespace Database\Seeders;

use App\Models\Cms;
use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = config('app.name');
        $url = config('app.url');
        $email = "$name@example.com";
        $contens = [
            'privacy-policy' => [
                [
                    'locale' => 'en',
                    'title' => 'Privacy Policy',
                    'content' => "<h1>Privacy Policy</h1><p>At $name, we respect and protect the privacy of our users. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website $url, including any other media form, media channel, mobile website, or mobile application related or connected thereto (collectively, the “Site”). Please read this privacy policy carefully. If you do not agree with the terms of this privacy policy, please do not access the site.</p><h2>Personal Information We Collect</h2><p>We do not collect any personal information unless it is voluntarily provided by you when you fill out a contact form or sign up for our newsletter.</p><h2>How We Use Your Information</h2><p>We may use the information collected in the following ways:</p><ul><li>To send you promotional emails containing news and updates about our company.</li><li>To respond to your inquiries or support requests.</li><li>To analyze trends, administer the site, track user/'s movements around the site, and gather demographic information.</li></ul><h2>Third-Party Privacy Policies</h2><p>This website may contain links to third-party websites. Our Privacy Policy does not apply to the practices of third-party websites and we cannot be held responsible for their actions.</p><h2>Changes to Our Privacy Policy</h2><p>We reserve the right to make changes to this Privacy Policy at any time and for any reason. We will alert you about any changes by updating the “Last Updated” date of this Privacy Policy.</p><h2>Contact Us</h2><p>If you have any questions about this Privacy Policy, please contact us at $email.</p>"
                ],
                [
                    'locale' => 'es',
                    'title' => 'Política de privacidad',
                    'slug' => 'privacy-policy',
                    'content' => "<h1>Política de privacidad</h1><p>En $name, respetamos y protegemos la privacidad de nuestros usuarios. Esta Política de privacidad explica cómo recopilamos, usamos, divulgamos y protegemos su información cuando visita nuestro sitio web $url, incluidas cualquier otra forma de medios, canal de medios, sitio web móvil o aplicación móvil relacionada o conectada al mismo (colectivamente, el “Sitio”). Por favor, lea esta política de privacidad cuidadosamente. Si no está de acuerdo con los términos de esta política de privacidad, por favor no acceda al sitio.</p><h2>Información personal que recopilamos</h2><p>No recopilamos ninguna información personal a menos que sea proporcionada voluntariamente por usted cuando complete un formulario de contacto o se registre en nuestro boletín.</p><h2>Cómo utilizamos su información</h2><p>Podemos utilizar la información recopilada de las siguientes maneras:</p><ul><li>Para enviarle correos electrónicos promocionales con noticias y actualizaciones sobre nuestra empresa.</li><li>Para responder a sus consultas o solicitudes de soporte.</li><li>Para analizar tendencias, administrar el sitio, rastrear los movimientos del usuario alrededor del sitio y recopilar información demográfica.</li></ul><h2>Políticas de privacidad de terceros</h2><p>Este sitio web puede contener enlaces a sitios web de terceros. Nuestra Política de privacidad no se aplica a las prácticas de los sitios web de terceros y no podemos ser responsables de sus acciones.</p><h2>Cambios en nuestra Política de privacidad</h2><p>Nos reservamos el derecho de realizar cambios en esta Política de privacidad en cualquier momento y por cualquier motivo. Le informaremos sobre cualquier cambio actualizando la fecha de “Última actualización” de esta Política de privacidad.</p><h2>Contáctenos</h2><p>Si tiene alguna pregunta sobre esta Política de privacidad, contáctenos en $email.</p>"
                ],
            ],
            'terms-conditions' => [
                [
                    'locale' => 'en',
                    'title' => 'Terms & Conditions',
                    'content' => "<h1>Terms & Conditions</h1>
                    <p>Please read these Terms and Conditions carefully before using our website.</p>
                    <h2>Interpretation and Definitions</h2>
                    <p>Interpretation</p>
                    <p>The words of which the initial letter is capitalized have meanings defined under the following conditions.</p>
                    <p>The following definitions shall have the same meaning regardless of whether they appear in singular or in plural.</p>
                    <h2>Definitions</h2>
                    <p>For the purposes of these Terms and Conditions:</p>
                    <ul>
                        <li>Company (referred to as either 'the Company', 'We', 'Us' or 'Our' in this Agreement) refers to $name.</li>
                        <li>Content refers to content such as text, images, or other information that can be posted, uploaded, linked to or otherwise made available by You, regardless of the form of that content.</li>
                        <li>You means the individual accessing or using the Service, or the company, or other legal entity on behalf of which such individual is accessing or using the Service, as applicable.</li>
                    </ul>
                    <h2>Links to Other Websites</h2>
                    <p>Our Service may contain links to third-party web sites or services that are not owned or controlled by $name.</p>
                    <p>$name has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third-party web sites or services. You further acknowledge and agree that $name shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</p>
                    <h2>Changes</h2>
                    <p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material, we will try to provide at least 30 days' notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>
                    <p>By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p>
                    <h2>Contact Us</h2>
                    <p>If you have any questions about these Terms, please contact us at $email.</p>"
                ],
                [
                    'locale' => 'es',
                    'title' => 'Términos y condiciones',
                    'content' => "<h1>Términos y condiciones</h1>
                    <p>Por favor, lea estos Términos y Condiciones cuidadosamente antes de usar nuestro sitio web.</p>
                    <h2>Interpretación y definiciones</h2>
                    <p>Interpretación</p>
                    <p>Las palabras cuya letra inicial está en mayúscula tienen significados definidos en las siguientes condiciones.</p>
                    <p>Las siguientes definiciones tendrán el mismo significado independientemente de si aparecen en singular o en plural.</p>
                    <h2>Definiciones</h2>
                    <p>Para los propósitos de estos Términos y Condiciones:</p>
                    <ul>
                        <li>La Compañía (referida como 'la Compañía', 'Nosotros', 'Nos' o 'Nuestro' en este Acuerdo) se refiere a $name.</li>
                        <li>Contenido se refiere a contenido como texto, imágenes u otra información que puede ser publicada, cargada, vinculada o de otra manera puesta a disposición por Usted, independientemente de la forma de ese contenido.</li>
                        <li>Usted significa el individuo que accede o utiliza el Servicio, o la empresa u otra entidad legal en nombre de la cual dicho individuo accede o utiliza el Servicio, según corresponda.</li>
                    </ul>
                    <h2>Enlaces a otros sitios web</h2>
                    <p>Nuestro Servicio puede contener enlaces a sitios web o servicios de terceros que no son propiedad ni están controlados por $name.</p>
                    <p>$name no tiene control sobre, y no asume responsabilidad por, el contenido, políticas de privacidad o prácticas de sitios web o servicios de terceros. Usted reconoce y acepta además que $name no será responsable ni tendrá obligación, directa o indirectamente, por cualquier daño o pérdida causados o supuestamente causados por o en conexión con el uso o la confianza en dicho contenido, bienes o servicios disponibles en o a través de dichos sitios web o servicios.</p>
                    <h2>Cambios</h2>
                    <p>Nos reservamos el derecho, a nuestra entera discreción, de modificar o reemplazar estos Términos en cualquier momento. Si una revisión es material, intentaremos proporcionar al menos 30 días de aviso antes de que los nuevos términos entren en vigencia. Lo que constituye un cambio material será determinado a nuestra entera discreción.</p>
                    <p>Al continuar accediendo o utilizando nuestro Servicio después de que esas revisiones entren en vigencia, usted acepta quedar vinculado por los términos revisados. Si no está de acuerdo con los nuevos términos, por favor deje de usar el Servicio.</p>
                    <h2>Contáctenos</h2>
                    <p>Si tiene alguna pregunta sobre estos Términos, por favor contáctenos en $email.</p>"
                ],
            ],
        ];

        foreach ($contens as $slug => $pages) {
            $cms = Cms::updateOrCreate([
                'slug' => $slug
            ]);
            foreach ($pages as $page) {
                $language_id = Language::where('code', $page['locale'])->value('id');
                $cms->translates()->updateOrCreate([
                    'language_id' => $language_id
                ], [
                    'title' => $page['title'],
                    'content' => $page['content']
                ]);
            }
        }
    }
}
