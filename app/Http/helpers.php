<?php
function getFormettedDate($date)
{
    if(!empty($date))
    {
        return date('d/m/Y',strtotime($date));
    }
    else
    {
        return "";
    }
}
function getFormettedDateTime($date)
{
    if(!empty($date))
    {
        return date('d/m/Y H:i a',strtotime($date));
     }
     else
     {
         return "";
     }
}

function NotMentionedText()
{
    return '<em class="small">Not Mentioned</em>';
}
?>