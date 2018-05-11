function main_page_init()
{
    $('input.autocomplete').autocomplete({
        data: {
            "http://": null,
            "https://": null,
            "http://www.": null,
            "https://www.": null
        },
    });
    $('.collapsible').collapsible();
    $('input.autoAdd').on("keyup", function(){
        if($(this).focus())
        {
            if(($(this).parent().parent().index() + 1) == $(this).parent().parent().parent().children().length && $(this).val().length > 0)
            {
                dynamicAddInputText($(this).parent().parent().parent());
            }
        }
    });
    $('.modal').modal();
    $('.dropdown-trigger').dropdown(
        {
            hover: true,
            gutter: 0,
            belowOrigin: true
        });

    initRow();
}

function send(){
    var data = null;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "https://carderla.co.kr/index.php/Car/getCar");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    $.getJSON("http://jsonip.com/?callback=?", function (data) {
        xhr.setRequestHeader("Access-Control-Allow-Origin","*");
        xhr.onload = function(){
            console.log(xhr.responseText);
        }

        xhr.onreadystatechange = function(){
            if(this.readyState === 4){
                console.log(xhr.responseText);
            }
        }

        xhr.send();
    });
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "https://carderla.co.kr/index.php/Car/getCar",
        contentType: "application/x-www-form-urlencoded",
        success: function(data){
            alert(data);
        }
    });
}

function initRow()
{
    $('.del-row').hide().on("mouseover", function(){
        $(this).css("color", "#7442f4");
    }).on("mouseleave", function() {$(this).css("color", "#000000");}).parent().on("mouseover", function(){
        if($(this).parent().children().length > 1)
        {
            $(this).children('.del-row').show();
            $(this).on("mouseleave", function(){$(this).children('.del-row').hide();})
        }
    });
}

function dynamicAddInputText(target)
{
    var index;

    var i;
    for(i = 1; i <= $(target).children().length + 1; i++)
    {
        if($(target).children().children().filter(function(){$(this).children("#"+$(target).attr("id")+"_key"+i.toString())}).length == 0)
        {
            index = i;
            break;
        }
    }
    $(target).append("<div class='row valign-wrapper'><div class='input-field col s5'><input id='"+$(target).attr("id")+"_key"+index+"' type='text' class='validate autoAdd'><label for='"+$(target).attr("id")+"_key"+index+"'>KEY</label></div><div class='input-field col s6'><input id='"+$(target).attr("id")+"_value"+index+"' type='text' class='validate autoAdd'><label for='"+$(target).attr("id")+"_value"+index+"'>VALUE</label></div><i onclick='clear_row(this);' class='material-icons del-row'>clear</i></div>");
    $($(target).children()[$(target).children().length-1]).on("keyup", "input", function(e){
        if($(this).focus())
        {
            if(($(this).parent().parent().index() + 1) == $(target).children().length && $(this).val().length > 0)
            {
                dynamicAddInputText(target);
            }
        }
    });
    initRow();
}

function clear_row(target)
{
    $(target).parent().remove();
}

function open_sign_up(){
    $('#modal_signIn').modal('close');
    $('#modal_signUp').modal('open');
}