/*global $*/
/*global $name*/
/*global $value*/
$(document).ready(function()
{
    $('#lookup').click(function()
    {
        if($('input[type="checkbox"]').prop("checked")==true)
        {
             $name = $('input[type="checkbox"]').attr('name');
             $value = $('input[type="checkbox"]').attr('value');
            $.ajax
            ({
                type: 'GET',
                url: "world.php",
                data:
                {
                    country: "$name '=' $value"
                },
                success: function(data)
                {
                    $('#result').html(data);
                }
            });
        }
        else
        {
            $.ajax
            ({
               type: 'GET',
               url: 'world.php',
               data:
               {
                   country: $('#country').val()
               },
               success: function(data)
               {
                   $('#result').html(data);
               }
            });
        }
    });
});