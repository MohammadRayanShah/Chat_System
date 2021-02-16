<!DOCTYPE html>
<html>
    <head>
        <title>Chat system</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
    </head>
    <body>

        <div id="wrapper">
            <h1>Hello</h1>
            <div class ="chat_wrapper">
                
                <div id ="chat"></div>
                <form method="POST" id='messagefrm'>
                    <textarea name="message" class ="textarea "></textarea>
                </form>
            </div>
        </div>

<script type="text/javascript">
    LoadChat();
    setInterval(function()
    {
         LoadChat();
    }, 1000);
    function LoadChat() {
        $.post('handlers/messages.php?action=getMessage',function(response){

            $('#chat').html(response);
            $('#chat').scrollTop($('#chat').prop('scrollHeight'));
        });
    }
$('.textarea').keyup(function(e)
{
if(e.which == 13)
{
    $('form').submit();
}
});

$('form').submit(function(){    

    var message=$('.textarea').val();
    $.post('handlers/messages.php?action=sendMessage&message='+message,function(response)
    {
                if(response==1)
        {
            LoadChat();
            document.getElementById('messagefrm').reset();
        }


    });

    return false;
});

</script>
    </body>
</html>