<?php
/**
 *    Template Name: Faire un don
 */
?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>


        <section id="photoHeader" class="faireUnDon" style="background-image: url('<?php the_field('uploader_une_image_pour_lentete');?>')">
            <div class="wrapper">
                <h1><?php echo(the_title()); ?></h1>
            </div>
        </section>
        <section id="presentationDon">
            <div class="wrapper">
                <?php echo(the_content()); ?>


                <?php if (get_field('afficher_un_encart_avec_image')): ?>

                    <?php if (have_rows('encart_avec_image')):

                        // loop through the rows of data
                        while (have_rows('encart_avec_image')) : the_row();?>

                            <p class="half">
                                <span class="chiffres"><?php the_sub_field('chiffre'); ?></span> <?php the_sub_field('legende'); ?><br/>
                                <span class="small"> <?php the_sub_field('petit_texte'); ?></span><br/>
                                <i class="child" style="background-image: url('<?php the_sub_field('image'); ?>');width:100%; background-position: center"></i>
                            </p>

                        <?php endwhile; ?>

                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </section>
       <?php  /*<iframe id="mfgWidget" width="100%" scrolling="no"  src="//www.helloasso.com/formulaire-don?oid=28958&theme=fcc12d" style="border:none;"></iframe>
        <iframe  id="mfgWidget" width="100%" scrolling="no" src="//www.helloasso.com/formulaire-don?oid=28958&urlEffectue=http%3A%2F%2Fvaincre-noma.com%2Fvotre-don-a-bien-ete-enregistre%2F&urlAnnule=http%3A%2F%2Fvaincre-noma.com%2Fnous-constatons-que-vous-navez-pas-finalise-votre-don%2F&urlRefuse=http%3A%2F%2Fvaincre-noma.com%2Fil-semblerait-qu-une-erreur-se-soit-produite%2F&theme=fcc12d" style="border:none;" onload="autoResize('mfgWidget')"></iframe>*/?>



        <section id="helloAssoForm">
            <div class="main">
                <h2>Sélectionnez votre montant</h2>

                <div class="tab">
                    <diV class="tabHeader">
                        <label class="active">
                            <input type="radio" id="frequecyInput" name="frequency" value="ONCE">Je donne une fois
                        </label><!--
                        --><label>
                            <input type="radio" id="frequecyInput" name="frequency" value="REGULAR">Je donne tous les mois
                        </label>
                    </diV>
                    <div class="tabContent">
                        <p>Choisissez le montant que vous souhaitez donner.</p>
                        <ul id="REGULAR">
                            <li>
                                <input type="text" value="6" readonly><p>Et bénéficiez d'une déduction fiscale de 3,96 €</p>
                            </li>
                            <li>
                                <input type="text" value="10" readonly><p>Et bénéficiez d'une déduction fiscale de 6,60 €</p>
                            </li>
                            <li>
                                <input type="text" value="20" readonly><p>Et bénéficiez d'une déduction fiscale de 13,20 €</p>
                            </li>
                            <li>
                                <input type="text" value="30" readonly><p>Et bénéficiez d'une déduction fiscale de 19,80 €</p>
                            </li>
                        </ul>
                        <ul id="ONCE" class="active">
                            <li>
                                <input class="active" type="text" value="10" readonly><p>Et bénéficiez d'une déduction fiscale de 6,60 €</p>
                            </li>
                            <li>
                                <input type="text" value="30" readonly><p>Et bénéficiez d'une déduction fiscale de 19,80 €</p>
                            </li>
                            <li>
                                <input type="text" value="65" readonly><p>Et bénéficiez d'une déduction fiscale de 42,90 €</p>
                            </li>
                            <li>
                                <input type="text" value="100" readonly><p>Et bénéficiez d'une déduction fiscale de 66 €</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <label class="once" for="customNumber">
                    <p><span>Montant libre :</span><input id="customNumber" type="text"></p>
                </label>

                <h2>Vos coordonnées</h2>

                <div class="input" id="who">
                    <p class="labelForm">Vous êtes :</p>
                    <label>
                        <input type="radio" name="UCDonateForm$rdblAdherent" value="person" checked><span class="radio"><span></span></span><span>Un particulier</span>
                    </label><!--
                    --><label>
                        <input type="radio" name="UCDonateForm$rdblAdherent" value="company"><span class="radio"><span></span></span><span>Un organisme</span>
                    </label>
                </div>

                <label class="input">
                    <p class="labelForm">Société :<br/><span class="facultative">(facultatif)</span></p>
                    <input type="text" id="compny">
                </label>


                <div class="input" id='genre'>
                    <p class="labelForm">Civilité :</p>
                    <label>
                        <input type="radio" name="UCDonateForm$grpCivilite" value="1" checked><span class="radio"><span></span></span><span>Madame</span>
                    </label><!--
                    --><label>
                        <input type="radio" name="UCDonateForm$grpCivilite" value="0"><span class="radio"><span></span></span><span>Monsieur</span>
                    </label>
                </div>

                <label class="input">
                    <p class="labelForm">Nom :</p>
                    <input id="formName"  class="obligatoire" type="text">
                </label>

                <label class="input">
                    <p class="labelForm">Prénom :</p>
                    <input id="formFisrtName" class="obligatoire"  type="text">
                </label>

                <label class="input">
                    <p class="labelForm">Adresse :</p>
                    <input id="formAdress" class="obligatoire"  type="text">
                </label>

                <label class="input">
                    <p class="labelForm">Ville :</p>
                    <input id="formCity"  class="obligatoire"  type="text">
                </label>

                <label class="input">
                    <p class="labelForm">Code postal :</p>
                    <input id="formZip" class="obligatoire"  type="text">
                </label>

                <label class="input">
                    <p class="labelForm">Pays :</p>
                    <input  class="obligatoire"  type="text">
                </label>

                <label class="input">
                    <p class="labelForm">Adresse email :<br/><span class="facultative">(pour votre reçu fiscal)</span></p>
                    <input  class="obligatoire email"  type="text">
                </label>

                <label class="input">
                    <p class="labelForm">Commentaire :<br/><span class="facultative">(facultatif)</span></p>
                    <input type="text" id="formComment">
                </label>


                <label  class="checkbox">
                    <input type="checkbox">
                    <span class="check"><span class="icon-ok"></span></span><p>Je souhaite que le don que je viens de faire ne soit pas diffusé sur le site et reste donc anonyme</p>
                </label>



                <h2>Pourboire</h2>
                <p class="helloAssoP">Le don que vous êtes en train de réaliser est opéré par la plateforme HelloAsso, qui ne prend pas de commission et reverse 100% de votre don à notre association. Pour continuer à faire vivre HelloAsso, n’hésitez pas à leur laisser un pourboire du montant de votre choix.</p>
                <div class="tip">
                    <input type="range" min="1" max="2.5" step="0.25" value="2"><label><input class="theTip" type="text"> euros</label>
                </div>
                <label  class="checkbox nomargintop">
                    <input type="checkbox" id="noTip">
                    <span class="check"><span class="icon-ok"></span></span><p>Je ne souhaite pas laisser de pourboire.</p>
                </label>

                <div class="recurrent">
                    <h2>Echéance du prélèvement mensuel</h2>

                    <p class="one">Vous serez prélevé tous les <input id="dueDate" type="number"> de chaque mois, à partir du mois prochain.</p>

                    <p class="caution">Afin de valider votre carte, le 1er prélèvement sera effectué aujourd'hui. Le prélèvement suivant sera débité le 22 avril 2015.</p>
                </div>

                <h2>Récapitulatif</h2>

                <p class="recap" id="recapDon"><span class="label">Votre don :</span><span class="value">10€</span></p>
                <p class="recap" id="recapTip"><span class="label">Votre pourboire :</span><span class="value">2€</span></p>

                <div class="total"><h3>Total</h3><div type="text" id="totalAmount">12 €</div>

                <p class="cgu"> Une version imprimable du reçu correspondant à votre don vous sera envoyée par mail. En cliquant sur le bouton "Faites un don" ci-dessus, vous acceptez les <a class="windowed" href="http://www.helloasso.com/conditions-generales-utilisation" target="_blank"> conditions générales d'utilisations</a> et comprenez que votre don n'est pas remboursable.</p>

                <p class="submit"><a class="button small ga-tracking" data-category="Conversion" data-action="Validation formulaire de don" data-label="12 €"  href="javascript:void(0);">Valider</a></p>
            </div>
            <aside class="fiscinfo">
                <span class="fiscImg"></span>
                <h3>Fiscalité</h3>
                <p>Le don à Vaincre Noma ouvre droit à déduction fiscale car il remplit les conditions générales prévues aux articles 200 et 238 bis du code général des impôts.<br>
                   Particulier : Vous pouvez déduire 66% de votre don dans la limite de 20% de votre revenu imposable.<br>
                   Entreprise : L’ensemble des versements à Vaincre Noma permet de bénéficier d’une réduction d’impôt sur les sociétés de 60% du Montant de ces versements, pris dans la limite de 5 / 1000 du C.A. H.T. de l’entreprise. Au-delà de 5 / 1000 ou en cas d’exercice déficitaire, l’excédent est reportable.</p>
                <div id="reducFisc">
                    <p>Vous faites un don de</p>
                    <div>
                        <input class="valueFisc" type="text" value="10" readonly><span>€</span>
                    </div>
                    <p>Votre don vous revient à</p>
                    <div>
                        <input class="deductionFisc" type="text" value="3.40" readonly><span>€</span>
                    </div>
                </div>
            </aside>
        </section>
    <?php endwhile; // OK, let's stop the page loop once we've displayed it ?>


<?php endif; // OK, I think that takes care of both scenarios (having a page or not having a page to show) ?>




<?php get_footer(); // This fxn gets the footer.php file and renders it ?>