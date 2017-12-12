{include $control->loadModel('ui')->getEffectViewFile('default', 'common', 'header.lite')}
<?php 
$from  = $control->session->user->account == 'guest' ? '' : $control->session->user->realname;
$email = $control->session->user->account == 'guest' ? '' : $control->session->user->email; 
?>
<form id='replyForm' method='post' action="{!echo inlink('reply', "messageID={$message->id}")}">
  <table class='table table-form'>
    <tr>
      <th class='w-60px'>{!echo $lang->message->from}</th>
      <td>
        <div class='required required-wrapper'></div>
        {!echo html::input('from', $from, "class='form-control'")}
      </td>
    </tr>
    <tr>
      <th>{!echo $lang->message->email}</th>
      <td>{!echo html::input('email', $email, "class='form-control'")}</td>
    </tr>
    <tr>
      <th>{!echo $lang->message->content}</th>
      <td>
        <div class='required required-wrapper'></div>
        {!echo html::textarea('content', '', "class='form-control' rows='5'")}
      </td>
    </tr>
    {if(zget($control->config->site, 'captcha', 'auto') == 'open')}
    <tr id='captchaBox'>{!echo $control->loadModel('guarder')->create4MessageReply()}</tr>
    {else}
    <tr id='captchaBox' class='hiding'></tr>
   {/if}
    <tr><td></td><td>{!echo html::submitButton()}</td></tr>
  </table>
</form>
{if($config->debug) js::import($jsRoot . 'jquery/form/min.js')}
{if(isset($pageJS)) js::execute($pageJS)}
{include TPL_ROOT . 'common/log.html.php'}
</body>
</html>
