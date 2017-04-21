

var username;
var roomname;

$(document).ready(function()
{
    username = $('#username').html();
    roomname = $('#roomname').html();

    alert(1);
    pullData();
    alert(2);

    $(document).keyup(function(e) {
        if (e.keyCode == 13)
            sendMessage();
        else
            isTyping();
    });
});

function pullData()
{
    retrieveChatMessages();
    retrieveTypingStatus();
    setTimeout(pullData,3000);
}

function retrieveChatMessages()
{
    $.post('retrieveChatMessages', {username: username, roomname: roomname}, function(data)
    {
        if (data.length > 0)
            $('#chat-window').append('<br><div>'+data+'</div><br>');
    });
}

function retrieveTypingStatus()
{
    $.post('retrieveTypingStatus', {username: username, roomname: roomname}, function(username)
    {
        if (username.length > 0)
            $('#typingStatus').html(username+' is typing');
        else
            $('#typingStatus').html('nobody is typing');
    });
}

function sendMessage()
{
    var text = $('#text').val();

    if (text.length > 0)
    {
        $.post('sendMessage', {text: text, username: username, roomname: roomname}, function()
        {
            $('#chat-window').append('<br><div style="text-align: right">'+text+'</div><br>');
            $('#text').val('');
            notTyping();
        });
    }
}

function isTyping()
{
    $.post('isTyping', {username: username,roomname: roomname});
}

function notTyping()
{
    $.post('notTyping', {username: username,roomname: roomname});
}