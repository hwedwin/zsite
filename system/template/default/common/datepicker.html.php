{if($extView = $control->getExtViewFile(__FILE__))}
{include $extView;}
{return helper::cd();}
{/if}
{$clientLang=$control->app->getClientLang();}
{!css::import($jsRoot . 'datetimepicker/css/min.css');}
{!js::import($jsRoot  . 'datetimepicker/js/min.js');}
{if($clientLang != 'en')}
{!js::import($jsRoot . 'datetimepicker/js/locales/' . $clientLang . '.js');}
{/if}
<script language='javascript'>
$(function()
{
    startDate = new Date(2000, 1, 1);
    $(".date").datetimepicker
    ({
        format: 'yyyy-mm-dd hh:ii',
        startDate:startDate,
        pickerPosition: 'top-left',
        todayBtn: true,
        autoclose: true,
        keyboardNavigation:false,
        language:'{$clientLang}'
    })
});
</script>
