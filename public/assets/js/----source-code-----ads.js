
$(document).ready(function(){
    var $sections = $('.form-section');
    function navigateTo(index){
        $sections.removeClass('current').eq(index).addClass('current');
        $('.form-navigation .previous').toggle(index>0);
        var atTheEnd = index >= $sections.length -1;
        $('.form-navigation .next').toggle(!atTheEnd);
        $('.form-navigation [Type=submit]').toggle(atTheEnd);
    }

    function curIndex(){
        return $sections.index($sections.filter('.current'));
    }

    $('.form-navigation .previous').click(function(e){
        e.preventDefault();
        if(curIndex() == 3 && $('#id_sub_sub_category').val() == 0){
            navigateTo(curIndex() - 2);
        }else{
            navigateTo(curIndex() - 1);
        }
    });
    $('.form-navigation .startfromzero').click(function(e){
        e.preventDefault();
        navigateTo(0);
    });

    $('.form-navigation .next').click(function(e){
        e.preventDefault();
        if(curIndex() == 3){
           if($("#cover").val() == ""){
                alert("صورة الغلاف ضرورية. قم بإضافة صورة للإعلان.");
            }else{
               /* if($("#picture1").val() == "" && $("#picture2").val() == ""){
                    alert("يجب إضافة 3 صور للإعلان على الأقل.");
                }else{*/
                    $("#ads-form").parsley().whenValidate({
                        group: 'block-'+ curIndex()
                    }).done(function(){
                        navigateTo(curIndex() + 1);
                    });
                //}
            }
        }else{
            if(curIndex() == 4){
                /* MAKE AJAX CALL TO GET CAT & SUBCAT DATA FROM ID AND PUT IT INTO category_menu_name */
                var id_category_from_input = $('#id_category').val();
                var id_sub_category_from_input = $('#id_sub_category').val();
                var id_sub_sub_category_from_input = $('#id_sub_sub_category').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '/ajax/category/from/id',
                    type: 'POST',
                    data:{
                        category:id_category_from_input,
                        subcategory:id_sub_category_from_input,
                        subsubcategory:id_sub_sub_category_from_input,
                    },
                    success: function(data) {
                        $('.category_menu_name').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.log("An error occurred: " + xhr.status + " " + error);
                    }
                });

                if($('#id_sub_category').val() == 1){ $('.cars-sell').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 2){ $('.cars-rent').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 4){
                    $('.id_parts').each(function(){ if($(this).attr('id_sub_sub_category_parts') ==  $('#id_sub_sub_category').val()){ $(this).removeClass('d-none').addClass('d-block'); }else{ $(this).removeClass('d-block').addClass('d-none'); } });
                    $('.cars-parts').removeClass('d-none').addClass('d-block');
                }
                if($('#id_sub_category').val() == 5){ $('.cars-accessories').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 6){ $('.cars-tyres').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 7){ $('.cars-trucks').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 8){
                    $('.id_heavy').each(function(){ if($(this).attr('id_sub_sub_category_heavy') ==  $('#id_sub_sub_category').val()){ $(this).removeClass('d-none').addClass('d-block'); }else{ $(this).removeClass('d-block').addClass('d-none'); } });
                    $('.cars-heavy').removeClass('d-none').addClass('d-block');
                }
                if($('#id_sub_category').val() == 9){ $('.cars-boats').removeClass('d-none').addClass('d-block'); }

                if($('#id_sub_category').val() == 12){ $('.motocycles-bicycles').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 13){ $('.motocycles-helmets').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 14){ $('.motocycles-accessories').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 15){
                    if($('#id_sub_sub_category').val() == 95){ $('.home-apartments-sell').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 96){ $('.home-villas-sell').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 97){ $('.home-houses-sell').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 98){ $('.home-lands-sell').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 99){ $('.home-stores-sell').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 100){ $('.home-chalets-sell').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 101){ $('.home-buildings-sell').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 102){ $('.home-external-buildings-sell').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1826){ $('.home-desks-sell').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1827){ $('.home-complexes-sell').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1828){ $('.home-galleries-sell').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1829){ $('.home-restaurants-sell').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1830){ $('.home-stocks-sell').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1831){ $('.home-supermarkets-sell').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1832){ $('.home-clinics-sell').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1833){ $('.home-commercial-villas-sell').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1834){ $('.home-floors-sell').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1835){ $('.home-hostels-sell').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1836){ $('.home-factories-sell').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1837){ $('.home-staff-sell').removeClass('d-none').addClass('d-block'); }

                }
                if($('#id_sub_category').val() == 16){
                    if($('#id_sub_sub_category').val() == 103){ $('.home-apartments-rent').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 104){ $('.home-stores-rent').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 105){ $('.home-hotel-rooms-rent').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 106){ $('.home-rooms-rent').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 107){ $('.home-villa-rent').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 108){ $('.home-houses-rent').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 109){ $('.home-lands-rent').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 110){ $('.home-chalets-rent').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 111){ $('.home-buildings-rent').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 112){ $('.home-external-buildings-rent').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1838){ $('.home-desks-rent').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1839){ $('.home-galleries-rent').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1840){ $('.home-stocks-rent').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1841){ $('.home-floors-rent').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1842){ $('.home-complexes-rent').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1843){ $('.home-commercial-villas-rent').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1844){ $('.home-restaurants-rent').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1845){ $('.home-supermarkets-rent').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1846){ $('.home-clinics-rent').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1847){ $('.home-factories-rent').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1848){ $('.home-staff-rent').removeClass('d-none').addClass('d-block'); }
                    if($('#id_sub_sub_category').val() == 1849){ $('.home-hostels-rent').removeClass('d-none').addClass('d-block'); }
                }
                if($('#id_sub_category').val() == 17){ $('.mobiles-mobiles').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 18){ $('.mobiles-tablets').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 19){ $('.mobiles-smartwatches').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 20){ $('.mobiles-headsets').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 21){ $('.mobiles-screenprotector').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 22){ $('.mobiles-chargers').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 23){ $('.mobiles-mobileparts').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 24){ $('.mobiles-accessories').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 25){ $('.mobiles-specialnumbers').removeClass('d-none').addClass('d-block'); }

                if($('#id_sub_category').val() == 26){ $('.gaming-devices').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 27){ $('.gaming-videogames').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 28){ $('.gaming-accessories').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 29){ $('.gaming-cards').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 30){ $('.gaming-accounts').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 31){ $('.gaming-games').removeClass('d-none').addClass('d-block'); }

                if($('#id_sub_category').val() == 32){ $('.fourniture-fourniture').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 33){ $('.fourniture-bedroom').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 34){ $('.fourniture-diningroom').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 35){ $('.fourniture-office').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 36){ $('.fourniture-outdoor').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 37){ $('.fourniture-accessories').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 38){ $('.fourniture-textile').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 39){ $('.fourniture-garden').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 40){ $('.fourniture-kitchen').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 41){ $('.fourniture-ma3n').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 42){ $('.fourniture-bathroom').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 43){ $('.fourniture-parquet').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 44){ $('.fourniture-alluminium').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 45){ $('.fourniture-light').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 46){ $('.fourniture-moquette').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 47){ $('.fourniture-brady').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 48){ $('.fourniture-other').removeClass('d-none').addClass('d-block'); }

                if($('#id_sub_category').val() == 49){ $('.job-search').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 50){ $('.job-offer').removeClass('d-none').addClass('d-block'); }

                if($('#id_sub_category').val() == 51){ $('.computers-laptop').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 52){ $('.computers-pc').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 53){ $('.computers-screen').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 54){ $('.computers-printer').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 55){ $('.computers-parts').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 56){ $('.computers-accessories').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 57){ $('.computers-storage').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 58){ $('.computers-gaming').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 59){ $('.computers-router').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 60){ $('.computers-server').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 61){ $('.computers-projector').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 62){ $('.computers-program').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 63){ $('.computers-fourniture').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 64){ $('.computers-pos').removeClass('d-none').addClass('d-block'); }

                if($('#id_sub_category').val() == 65){ $('.electronics-tv').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 66){ $('.electronics-kitchen').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 67){ $('.electronics-freezer').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 68){ $('.electronics-dryer').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 69){ $('.electronics-kettle').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 70){ $('.electronics-four').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 71){ $('.electronics-microwave').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 72){ $('.electronics-airconditioner').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 73){
                    $('.id_camera').each(function(){ if($(this).attr('id_sub_sub_category_camera') ==  $('#id_sub_sub_category').val()){ $(this).removeClass('d-none').addClass('d-block'); }else{ $(this).removeClass('d-block').addClass('d-none'); } });
                    $('.electronics-camera').removeClass('d-none').addClass('d-block');
                }
                if($('#id_sub_category').val() == 74){ $('.electronics-receiver').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 75){ $('.electronics-audiovideo').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 76){ $('.electronics-home').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 77){ $('.electronics-perso').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 78){ $('.electronics-greenhouse').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 79){ $('.electronics-puller').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 80){ $('.electronics-cleaner').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 81){ $('.electronics-waterfilter').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 82){ $('.electronics-security').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 83){ $('.electronics-fax').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 84){ $('.electronics-accessories').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 85){
                    $('.id_clothes_women').each(function(){ if($(this).attr('id_sub_sub_category_clothes_women') ==  $('#id_sub_sub_category').val()){ $(this).removeClass('d-none').addClass('d-block'); }else{ $(this).removeClass('d-block').addClass('d-none'); } });
                    $('.clothes-women-clothes').removeClass('d-none').addClass('d-block');
                }
                if($('#id_sub_category').val() == 86){ $('.clothes-women-shoes').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 87){ $('.clothes-women-watch').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 88){ $('.clothes-women-jewelry').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 89){ $('.clothes-women-bags').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 90){ $('.clothes-women-perfumes').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 91){
                    $('.id_makeup_women').each(function(){ if($(this).attr('id_sub_sub_category_makeup_women') ==  $('#id_sub_sub_category').val()){ $(this).removeClass('d-none').addClass('d-block'); }else{ $(this).removeClass('d-block').addClass('d-none'); } });
                    $('.clothes-women-makeup').removeClass('d-none').addClass('d-block');
                }
                if($('#id_sub_category').val() == 92){
                    $('.id_clothes_men').each(function(){
                        if($(this).attr('id_sub_sub_category_clothes_men') ==  $('#id_sub_sub_category').val()){ $(this).removeClass('d-none').addClass('d-block'); }else{ $(this).removeClass('d-block').addClass('d-none');} });
                    $('.clothes-men-clothes').removeClass('d-none').addClass('d-block');
                }
                if($('#id_sub_category').val() == 93){ $('.clothes-men-shoes').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 94){ $('.clothes-men-watch').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 95){ $('.clothes-men-accessories').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 96){ $('.clothes-men-care').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 98){ $('.clothes-men-perfumes').removeClass('d-none').addClass('d-block'); }

                if($('#id_sub_category').val() == 100){ $('.toys-bed').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 102){ $('.toys-accessories').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 103){
                    $('.id_clothes_baby').each(function(){ if($(this).attr('id_sub_sub_category_clothes_baby') ==  $('#id_sub_sub_category').val()){ $(this).removeClass('d-none').addClass('d-block'); }else{ $(this).removeClass('d-block').addClass('d-none'); } });
                    $('.toys-clothes').removeClass('d-none').addClass('d-block');
                }
                if($('#id_sub_category').val() == 105){ $('.food-oil').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 106){ $('.food-dates').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 107){ $('.food-honey').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 108){ $('.food-ready').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 109){ $('.food-desserts').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 110){ $('.food-foodsupplements').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 111){ $('.food-cheese').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 112){ $('.food-vegetablefruit').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 113){ $('.food-meat').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 114){ $('.food-othersfoodsupplements').removeClass('d-none').addClass('d-block'); }

                if($('#id_sub_category').val() == 115){ $('.formations-tutorials').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 116){ $('.formations-private').removeClass('d-none').addClass('d-block'); }

                if($('#id_sub_category').val() == 156){ $('.animals-cats').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 157){ $('.animals-dogs').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 158){ $('.animals-babarae').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 159){ $('.animals-hamam').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 160){ $('.animals-dajaj').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 161){ $('.animals-ghanam').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 162){ $('.animals-maiz').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 163){ $('.animals-khayl').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 164){ $('.animals-jamal').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 165){ $('.animals-toyor').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 166){ $('.animals-asmak').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 167){ $('.animals-salahif').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 168){ $('.animals-aranib').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 169){ $('.animals-hamster').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 170){ $('.animals-abkar').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 171){ $('.animals-ghizlane').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 172){ $('.animals-hamir').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 173){ $('.animals-accessories').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 174){ $('.animals-food').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 175){ $('.animals-entrainement').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 176){ $('.animals-care').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 177){ $('.animals-other').removeClass('d-none').addClass('d-block'); }

                if($('#id_sub_category').val() >= 178 && $('#id_sub_category').val() <= 189){ $('.sport-all').removeClass('d-none').addClass('d-block'); }

                if($('#id_sub_category').val() == 190){ $('.books.shippingwithstatus').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() == 191){ $('.books.guitar').removeClass('d-none').addClass('d-block'); }

                if($('#id_sub_category').val() >= 192 &&  $('#id_sub_category').val() <= 194){ $('.books.shippingonly').removeClass('d-none').addClass('d-block'); }
                if($('#id_sub_category').val() >= 195 && $('#id_sub_category').val() <= 204){ $('.other-all').removeClass('d-none').addClass('d-block'); }

            }
            $("#ads-form").parsley().whenValidate({
                group: 'block-'+ curIndex()
            }).done(function(){
                navigateTo(curIndex() + 1);
            });
        }
    });
    $('.form-navigation .devnext').click(function(e){
        e.preventDefault();
        $("#ads-form").parsley().whenValidate({
            group: 'block-'+ curIndex()
        }).done(function(){
            navigateTo(curIndex() + 1);
        });
    });
    $('.SelectCategory').click(function(e){
        e.preventDefault();
        var CategoryID = $(this).attr('id');
        $("#id_category").val(CategoryID);
        if(CategoryID == 3){
            $("#id_sub_category").val($(this).attr('subcategory'));
            $('.SelectSubSubCategory').each(function(){
                if($(this).attr('id-sub-category') == $("#id_sub_category").val()){
                    $(this).removeClass('d-none');
                }else{
                    $(this).addClass('d-none');
                }
            });
            $("#ads-form").parsley().whenValidate({
                group: 'block-'+ curIndex()
            }).done(function(){
                navigateTo(curIndex() + 1);
            });
        }
        if($("#id_category").val() == 0 || $("#id_category").val() == "" || $("#id_category").val() == null){
            alert("المرجو اختيار القسم");
        }else{
            $('.SelectSubCategory').each(function(){
                if($(this).attr('id-category') == CategoryID){
                    $(this).removeClass('d-none');
                }else{
                    $(this).addClass('d-none');
                }
            });
           $("#ads-form").parsley().whenValidate({
                group: 'block-'+ curIndex()
            }).done(function(){
                navigateTo(curIndex() + 1);
            });
        }
    });

    $('.SelectSubCategory').click(function(e){
        e.preventDefault();
        $("#id_sub_category").val($(this).attr('id'));
        if($(this).attr('id') == '49'){
            window.location.href=$(this).attr('cv');
        }else{
            if($(this).attr('has-sub-sub-category') == 1){ // IF SUBCAT HAS SUBSUBCAT OR NOT
                $('.SelectSubSubCategory').each(function(){
                    if($(this).attr('id-sub-category') == $("#id_sub_category").val()){
                        $(this).removeClass('d-none');
                    }else{
                        $(this).addClass('d-none');
                    }
                });

                $("#ads-form").parsley().whenValidate({
                    group: 'block-'+ curIndex()
                }).done(function(){
                    navigateTo(curIndex() + 1);
                });
            }else{
                $("#id_sub_sub_category").val(0);
                $("#ads-form").parsley().whenValidate({
                    group: 'block-'+ curIndex()
                }).done(function(){
                    navigateTo(curIndex() + 2);
                });
            }
        }
    });

    $('.SelectSubSubCategory').click(function(e){
        e.preventDefault();
        $("#id_sub_sub_category").val($(this).attr('id'));
        $("#ads-form").parsley().whenValidate({
            group: 'block-'+ curIndex()
        }).done(function(){
            navigateTo(curIndex() + 1);
        });
    });
    $sections.each(function(index, section){
        $(section).find(':input').attr('data-parsley-group','block-'+index);
    });
    navigateTo(0);

  $("#SearchCategory").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#CategoryList button").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  $("#SearchSubCategory").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#SubCategoryList button").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  $("#SearchSubSubCategory").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#SubSubCategoryList button").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
