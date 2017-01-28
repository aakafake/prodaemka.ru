<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script type="text/javascript">		function check_metod(){			$("#iml input[name=shipping]").attr("checked", "checked");		}        function initIML_Map(region) {			$("#iml_address_text").html(region);			$("#iml_address_city").val(region);			$("#iml .resalt_moduel_price").css("display","none");            $("#map").empty();            var myMap;            $.ajax({                type: "POST",                url: "https://list.iml.ru/sd?type=json",                data: { "": region },                dataType: "json",                success: function (data) {                    var i1 = 0;                    var i2 = 0;                    var arrObj = [];                    $("#sdlist").empty();                    myMap = new ymaps.Map("map", {                        center: [Number(data[0].Latitude), Number(data[0].Longitude)],                        zoom: 10                    });                    $.each(data, function () {                        inner = this;                        arrObj[i1] = inner;                        var paymentCardStr = "Да";                        if (arrObj[i1].PaymentCard == 0) { paymentCardStr = "Нет"; }                        var myPlacemark = new ymaps.Placemark([Number(arrObj[i1].Latitude), Number(arrObj[i1].Longitude)], {                            iconContent: "IML",                            balloonContent: "<span style=font-weight: bold>" + arrObj[i1].Name + "</span>" + "<br />" +                                arrObj[i1].Address + "<br />" +                                "Оплата картой: " + paymentCardStr + "<br />" +                                "Время работы: " + arrObj[i1].WorkMode +                                "<br /><button onclick="GetPVZ(" + arrObj[i1].RequestCode + ");return false" >Выбрать</button>"                        }, {                            preset: "islands#violetStretchyIcon"                        });                        myMap.geoObjects.add(myPlacemark);                        var li_html = "<li onclick="GetPVZ(" + arrObj[i1].RequestCode + ");"><span style=font-weight: bold>" + arrObj[i1].Name + "</span>" + "<br />" +                                    arrObj[i1].Address + "<br />" +                                    "Оплата картой: " + paymentCardStr + "<br />" +                                    "Время работы: " + arrObj[i1].WorkMode + "<br />" +                            "   ---   </li>";                        $("#sdlist").append(li_html);                        i1++;                    });                }            });        };    </script>
<div class="itemOdd">   <p>
        <span class="bold">Пункты выдачи IML</span>
    </p>
    <!-- QIWI Post code begin -->
    <!-- QIWI Post code end -->
    <div id="iml"><p>
            <label for="iml"><input type="radio" name="shipping" value="iml_iml" checked="checked" id="iml" />&nbsp;

                <span class="order_hidden">Ваш город: </span><select id="selectRegionCombo" class="order_hidden" onchange="check_metod(); return initIML_Map(this.value);return false;">
                </select>
                <span class="order_hidden">Выберите точку доставки на карте:</span>
                <div>
                    <div id="map" style="height:600px; width:600px;  " />
                </div>
                <div id="sdlist_div" style="overflow: auto; height:600px; width:250px; padding:0; font-size:12px;  ">
                    <ul id="sdlist" style="padding-left:2px;"></ul>
                </div>

                <script type="text/javascript">
                    function cl_modal(id){

                        $(id).removeClass("in").css("display","none");

                    }

                    function Getresalt_price(pvz) {

                        var tochka = pvz;
                        var city_from = encodeURI("САНКТ-ПЕТЕРБУРГ");
                        var city_to = encodeURI($("#iml_address_city").val());
                        var weight = $("#iml_weight").val();
                        var iml_total = $("#iml_total").val()*1;
                        var iml_persent = $("#iml_persent").val()*1;
                        var iml_base_cost = $("#iml_base_cost").val()*1;
                        $.ajax({
                            url: "index_ajax.php",
                            dataType : "html",
                            type: "GET",
                            data: "q=includes/modules/ajax/iml_price.php&city_from="+city_from+"&city_to="+city_to+"&weight="+weight+"&tochka="+tochka,
                            success: function(msg){

                                $("#iml_cost_json").val(msg+" - цена");

                                var cost = Math.round( iml_base_cost+(iml_total/100*iml_persent)+msg*1 );

                                if (!isNaN(cost)){
                                    $("#iml input[name=shipping]").prop("checked", true).attr("checked", "checked");
                                    $("#iml_cost").val(cost);
                                    $("#iml .resalt_moduel_price").html(cost+" руб.").css("display","inline").css("font-size","16px").css("font-weight","bold");

                                }else{
                                    //alert(msg+"Доставка в данный пункт не возможна.");
                                    $("#iml input[name=shipping]").attr("checked", "false");
                                    $("#iml input[name=shipping]").removeAttr("checked");
                                    $("#pop_modal").addClass("error");
                                }

                            }
                        });
                    }

                    function GesStreet(city, id){
                        var city = encodeURI(city);
                        $.ajax({
                            url: "index_ajax.php",
                            dataType : "html",
                            type: "GET",
                            data: "q=includes/modules/ajax/iml_price.php&RegionCode="+city+"&tochka="+id,
                            success: function(msg){
                                //alert(msg);	// на самом деле будем в функцию передавать

                                $("#pop_modal").css("display","block").addClass("in");
                                $("#modal-body-resalt").html(" "+msg+" ");
                                $("#iml_address_text").html(" "+msg+" ");
                                $("#iml_address").val(msg);

                            }
                        });
                        return false;
                    }

                    function GetPVZ(pvz) {
                        $("#pop_modal").removeClass("error");
                        var iml_id = document.getElementById("iml_id");
                        var iml_address_text = document.getElementById("iml_address_text");
                        var iml_cost =  document.getElementById("iml_cost").innerHTML;
                        var iml_address = document.getElementById("iml_address");
                        var iml_address_city = document.getElementById("iml_address_city");
                        var iml_address_city_val = iml_address_city.value;
                        var n = document.getElementById("selectRegionCombo").options.selectedIndex.value;
                        iml_address_text.innerHTML = iml_address_city.value+" (" + pvz + ") ";
                        iml_address.value = iml_address_city.value+" (" + pvz + ") ";
                        iml_id.value = pvz;
                        Getresalt_price(pvz);
                        check_metod();

                        GesStreet(iml_address_city_val, pvz);

                        //alert("Вы выбрали пункт " + pvz);

                        return false;
                    }

                    ymaps.ready().done(function () {

                        $.ajax({
                            url: "//list.iml.ru/SelfDeliveryRegions?type=json",
                            success: function (data) {

                                data = JSON.parse(data);

                                //alert(data.length+data[1].Description ); // 1

                                for (var i = 0; i < data.length; i++) {
                                    $("#selectRegionCombo")
                                        .append($("<option></option>")
                                            .attr("value", data[i].Code)
                                            .text(data[i].Description));
                                }
                                $("#selectRegionCombo [value=САНКТ-ПЕТЕРБУРГ]").attr("selected", "selected");
                            }
                        });


                        initIML_Map("САНКТ-ПЕТЕРБУРГ");
                        $("#iml input[name=shipping]").attr("checked", "false");
                        $("#iml input[name=shipping]").removeAttr("checked");
                        $("#checkout_address #map").css("display","block");
                        $("#checkout_address #sdlist_div").css("display","block");

                        $("#checkout_address").submit(function(){

                            var adrr = $("#iml_address").val();
                            var input_iml = $("input#iml")
                            //if ( input_iml.attr("checked") == "checked" && adrr == ""){
                            if ( input_iml.prop("checked") && adrr == ""){
                                alert("Вы не выбрали точку доставки на карте");
                                return false;
                            }

                        });

                    });
                </script>
                <style>
                    #pop_modal{display:none;}
                    #sdlist{margin-left:0px}
                    #sdlist li{list-style: none;}
                    #sdlist li:hover{cursor:pointer;background-color:#DDD }
                    button.close_modal:not(.cross){ background-color: #FBA910;    opacity: 1;    color: #FFF;    padding:7px 10px;    text-transform: uppercase;    font-weight: normal;    font-size: 17px;    font-family: Arial, sans-self;}
                    button.close_modal.error{display:none;background-color: #FB6410;}
                    .error button.close_modal:not(.cross){display:none;}
                    .error button.close_modal.error{display:block;}
                    .order_hidden{}
                    #checkout_address .order_hidden{display:inline;}
                </style>
                <div class="order_hidden">
                    <input type="hidden" name="iml_id" id="iml_id" value="" />
                    <input type="hidden" name="iml_address" id="iml_address" value="" />
                    <input type="hidden" name="iml_address_city" id="iml_address_city" value="" />
                    <input type="hidden" name="iml_weight" id="iml_weight" value="'.$_SESSION['cart']->show_weight().'" />
                    <input type="hidden" name="iml_total" id="iml_total" value="'.$_SESSION['cart']->show_total().'" />
                    <input type="hidden" name="iml_persent" id="iml_persent" value="'.MODULE_SHIPPING_IML_COST_PERSENT.'" />
                    <input type="hidden" name="iml_base_cost" id="iml_base_cost" value="'.MODULE_SHIPPING_IML_COST.'" />
                    <span id="iml_link" style="color:blue;">'.MODULE_SHIPPING_IML_TEXT_SELECT_ADDRESS.':</span><span id="iml_address_text"></span>
                    Итоговая стоимость:
                    <input type="hidden" name="iml_cost_json" id="iml_cost_json" value="" />
                    <input type="hidden" name="iml_cost" id="iml_cost" value="" /> <span type="hidden" name="iml_cost_text" id="iml_cost_text"></span>
                    <div id="pop_modal" class="modal fade" role="dialog" style="top:50%">
                        <div class="modal-header" style="padding: 0px;">
                            <h3 style="font-size:24px;border-bottom: 1px #DDD solid;text-align: center;background-color: #C7CE40;color: #FFF;">'.MODULE_SHIPPING_IML_TEXT_TITLE.'<button type="button" class="close close_modal cross" onclick="cl_modal(\'#pop_modal\');return false;" href="javascript:void(0);" >×</button></h3>
                        </div>
                        <div class="modal-body">
                            <div id="modal-body-resalt"></div><br/>
                            <button type="button" class="close close_modal ok" style="width:100%" onclick="cl_modal(\'#pop_modal\');return false;" href="javascript:void(0);" >Хорошо</button>
                            <button type="button" class="close close_modal error" style="width:100%"onclick="cl_modal(\'#pop_modal\');return false;" href="javascript:void(0);" >Понятно, выберу другой</button>
                        </div>
                    </div>
                </div>
    </div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="resalt_moduel_price"> 75 руб.</span></label>
    </p> </div></div>

</fieldset>