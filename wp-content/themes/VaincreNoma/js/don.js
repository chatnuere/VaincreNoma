/**
 * Created by ChatNoir on 21/03/15.
 */

String.prototype.sansAccent = function(){
    var accent = [
        /[\300-\306]/g, /[\340-\346]/g, // A, a
        /[\310-\313]/g, /[\350-\353]/g, // E, e
        /[\314-\317]/g, /[\354-\357]/g, // I, i
        /[\322-\330]/g, /[\362-\370]/g, // O, o
        /[\331-\334]/g, /[\371-\374]/g, // U, u
        /[\321]/g, /[\361]/g, // N, n
        /[\307]/g, /[\347]/g, // C, c
    ];
    var noaccent = ['A','a','E','e','I','i','O','o','U','u','N','n','C','c'];

    var str = this;
    for(var i = 0; i < accent.length; i++){
        str = str.replace(accent[i], noaccent[i]);
    }

    return str;
}
    var backupCheck
var initDon = function(){

    /*$(document).on('input', 'input[type="range"]', function(e) {
        $('.theTip').value() = $(this).value;
    });*/

    initRageSlider();

    var d = new Date();




    $('.recurrent input').val(parseInt(d.getDate()))
    $('.tabHeader label').on('click', function(){

        var selected = $(this).find('input').val();
        $('.tabHeader label').removeClass('active');
        $('.tabContent ul').removeClass('active');
        $('.once').removeClass('active');
        $('.once').find('input').val('');
        $(this).addClass('active');
        $('#' + selected ).addClass('active');
        $('#' + selected  +' li:first-child').find('input').addClass('active');

        if (selected == 'REGULAR'){
            $('.recurrent').addClass('active');
        }else{
            $('.recurrent').removeClass('active');
        }
        updateValue(parseInt($('#' + selected  +' li:first-child').find('input').val()));


    });

    $('.tabContent ul li').on('click', function(){
        $('.tabContent ul li').find('input').removeClass('active');
        $('.once').removeClass('active');
        $('.once').find('input').val('');
        $(this).find('input').addClass('active');
        updateValue(parseInt($(this).find('input').val()));
    });

    $('#customNumber').on('input', function(){
        var value = parseFloat($(this).val().replace(',', '.' ));
        if(!isNaN(value) && value > 0){
            $('.tabContent ul li').find('input').removeClass('active')
            $('.once').addClass('active');

             updateValue(value);
        }
    });

    $('#noTip').on('change', function(){


        if($(this).prop('checked')){
            backupCheck = parseFloat($('.theTip').val());
            $('.theTip').val('0');
            $('#recapTip .value').html(0+'€');
            updateTotalValue(parseFloat($('.valueFisc').val()), parseFloat($('.theTip').val()));
        }else{
            $('.theTip').val(backupCheck);
            $('#recapTip .value').html(backupCheck+'€');
            updateTotalValue(parseFloat($('.valueFisc').val()), parseFloat($('.theTip').val()));
        }
    });


    $('.theTip').on('input', function(){
        updateTotalValue(parseFloat($('.valueFisc').val()) , parseFloat($(this).val().replace(',', '.' )));
        $('#recapTip .value').html(parseFloat($(this).val().replace(',', '.' ))+'€');
    });

    $('#who input').on('change', function(){
        updateFisc($('#who input:checked').val(), parseFloat($('.valueFisc').val()));
    });

    $('.submit a').on('click', function(){
        checkform();
    })

}

var updateValue = function(value){
    $('.valueFisc').val(value);
    updateFisc($('#who input:checked').val(), value);
    $('#recapDon .value').html(value+'€');

    updateTipFromValue(value);
    updateTotalValue(value, parseFloat($('.theTip').val()));



}
var updateTotalValue = function(don , tip){
    var total = (parseFloat(don) + parseFloat(tip) )+' €';
    $('.submit .ga-tracking').attr('data-label', total);

    console.log($('.submit .ga-tracking').length)
    $('#totalAmount').html(total)
}
var updateTipFromValue = function(value){

    if (value <= 10 ) {
        var minTip = 10;
        var maxTip = 25;
        var currentTip = 20;
    }else if ( 10 < value && value <= 100){
        var minTip = 5;
        var maxTip = 10;
        var currentTip = 5;
    }else if ( 100 < value && value <= 1000){
        var minTip = 1;
        var maxTip = 3;
        var currentTip = 2;
    }else if ( 1000 < value){
        var minTip = 0.5;
        var maxTip = 2;
        var currentTip = 1.3;
    }
    $('input[type="range"]').rangeslider('destroy');
    $('input[type="range"]').attr('min' , ( value * (minTip / 100)));
    $('input[type="range"]').attr('max' , ( value * (maxTip / 100)));
    $('input[type="range"]').val( value * (currentTip / 100));


    initRageSlider();


}

var updateFisc = function(who, value){
    if(who == 'person' ){
        var total = value - (value * (66/100))

        if (!(total % 1 === 0)){
            total = total.toFixed(2);
        }
    }else{
        var total = value - (value * (60/100))

        if (!(total % 1 === 0)){
            total = total.toFixed(2);
        }

    }
    $('.deductionFisc').val(total);
}

var initRageSlider = function(){

    $('input[type=range]').rangeslider({
        polyfill: false,
        onInit   : function (pos , value) {
            this.$handle.append('<&nbsp;&nbsp;&nbsp;&nbsp;>');
            this.update();
            $('#recapTip .value').html(value+'€');
        },
        onSlide  : function (pos , value) {
            $('.theTip').val(value);
            $('#recapTip .value').html(value+'€');
            updateTotalValue(parseFloat($('.valueFisc').val()), value);
            $('#noTip').attr('checked', false);
        }
    });


}

var checkform = function(){
    $('.error').removeClass('error');
    $('p.error').remove();
    var error = new Array()

    $('.obligatoire').each(function(){

    if($(this).val().length == 0){
        error.push($(this));
        $(this).addClass('error');
        $(this).attr('placeholder', 'veuillez préciser une valeur s\'il vous plait');
    }

    });
    if( test($('.email').val())) {
        $('.emailErrorMsg').remove()
        error.push($('.email'));
        $('.email').addClass('error');
        $("<p class='emailErrorMsg'>Veuillez entrer un email valide s\'il vous plait</p>").insertAfter($('.email'));
    }

    if($('.active #frequecyInput').val() == 'REGULAR'){

        if($('#dueDate').val().length == 0){
            error.push($('#dueDate'));
            $('#dueDate').addClass('error');
            $('#dueDate').attr('placeholder', 'veuillez préciser une valeur s\'il vous plait');
        }

        if(isNaN($('#dueDate').val()) || parseInt($('#dueDate').val()) > 31 || parseInt($('#dueDate').val())< 1){
            $('.spanError').remove();
            error.push($('#dueDate'));
            $('#dueDate').addClass('error');
            $("<span class='spanError'>veuillez entrer un chiffre entre 1 et 31</span>").insertAfter($('#dueDate'));
        }

    }


    if(error.length > 0){
        $('html, body').animate({
            scrollTop:(error[0].offset().top- 50)
        }, 'slow');
    }else{



            var url = 'https://api.helloasso.com/donate' +
            '?oid=28958'   +
            '&reference='  + encodeURIComponent( getGiftReference($('#formName').val().sansAccent() , $('#formFisrtName').val().sansAccent() , $('.active #frequecyInput').val())) +
            '&appId=F7nlG0SJWYCBdIwFnaYaQmmha3VQszSLLWCUtgPZJd9ewfMpNg' +
            '&email='      + encodeURIComponent( $('.email').val() ) +
            '&title='      + encodeURIComponent( $('#genre input:checked').val() ) +
            '&name='       + encodeURIComponent( $('#formName').val() ) +
            '&firstName='  + encodeURIComponent( $('#formFisrtName').val() ) +
            '&address='    + encodeURIComponent( $('#formAdress').val() ) +
            '&zipCode='    + encodeURIComponent( $('#formZip').val() ) +
            '&city='       + encodeURIComponent( $('#formCity').val() ) +
            '&amount='     + encodeURIComponent( $('.valueFisc').val() * 100 ) +
            '&tip='        + encodeURIComponent( (parseInt($('.theTip').val()) * 100 )) +
            '&frequency='  + encodeURIComponent( $('.active #frequecyInput').val() ) +
            '&urlCallback='+ encodeURIComponent( 'http://vaincre-noma.com/ipn-reponse-api-helloasso/' ) +
            '&urlEffectue='+ encodeURIComponent( 'http://vaincre-noma.com/votre-don-a-bien-ete-enregistre/' ) +
            '&urlAnnule='  + encodeURIComponent( 'http://vaincre-noma.com/nous-constatons-que-vous-navez-pas-finalise-votre-don/' ) +
            '&urlRefuse='  + encodeURIComponent( 'http://vaincre-noma.com/il-semblerait-qu-une-erreur-se-soit-produite/' ) //+
            //'&mode=PREPROD'



        if($('#company').length > 0){
            url += '&company='+$('#company').val()
        }

        if($('#formComment').length > 0){
            url += '&comment='+$('#formComment').val()
        }

        if($('.tabHeader input:checked').val() == "REGULAR"){
            url += '&dueDate='+$('#dueDate').val()
        }

        if($(window).width() <= 800){
            url += '&use=MOBILE'
        }
        

    }
}

function getGiftReference(name, firstname , frequency){
    var m_names = new Array("Janvier" , "Février" , "Mars" , "Avril" , "Mai" , "Juin" , "Juillet" , "Août" , "Septembre" , "Octobre" , "Novembre" , "Décembre");
    var date = new Date();
    var curr_month = m_names [date.getMonth()];
    var curr_year = date.getFullYear();
    var curr_day =  date.getDate();
    var curr_hour = date.getHours();
    var curr_minutes = date.getMinutes() ;


    return name + '-' + firstname + '_' + curr_day + '-' + curr_month + '-' + curr_year + '-' + curr_hour + ':' + curr_minutes + '_' + frequency
}

function test(string) {
    return ! string.match(/[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/);
}