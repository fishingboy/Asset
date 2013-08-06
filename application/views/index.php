<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>阿彬自製帳務管理系統</title>
<style>@import URL("sys/style/dom.css");</style>
<style>@import URL("sys/style/style.css");</style>
<style>@import URL("/global/style/jquery-ui.css");</style>
<script src="/global/js/jquery.js"></script>
<script src="/global/js/jquery-ui.js"></script>
<script>
    function search()
    {
        var month = $("#fmMonth").val();
        window.location.href = "/asset/?date=" + month + "&keyword=" + $("#fmKeyword").val() + "&priceUp=" + $("#priceUp").val() + "&priceDown=" + $("#priceDown").val();
    }
    function searchEnter(e)
    {
        if (e.keyCode == 13) search();
    }
</script>
</head>
<body>
    <div id=wrapper>
        <div id=menu><div class='menuItem '><a href='index.php'>流水帳</a></div>
<div class='menuItem '><a href='index.php?f=insert'>記帳</a></div>
<div class='menuItem '><a href='index.php?f=budget'>預算</a></div>
<div class='menuItem '><a href='index.php?f=assets'>資產</a></div>
<div class='menuItem '><a href='index.php?f=statistic'>統計</a></div>
<div class=clear></div>
</div>
        <div id=main><script>
    function filterDisplay()
    {
        if ($("#fmAdvFilter").attr("checked"))
            $("#advFilter").fadeIn("slow");
        else
            $("#advFilter").fadeOut("slow");
    }
    function bill_import()
    {
        window.location.href = "/asset/bill/import.php";
    }
    
    function editCategory()
    {
        
    }
</script>
<div id=filter name=filter style='text-align: right'>
    <div style='float:left'>
        <input type=checkbox id=fmAdvFilter value='1' onclick='filterDisplay()'>進階搜尋
    </div>
    <div style='float:right'>
        <span id=advFilter style='display:none'>
            <input type=text id=priceUp name=priceUp value='' size=5>元以上
            <input type=text id=priceDown name=priceDown value='' size=5>元以下
        </span>
        <select id=fmMonth name=fmMonth onChange='search()'>
            <option value='0'>全部
            <option value='2013-01'>2013-01月<option value='2012-12'>2012-12月<option value='2012-11'>2012-11月<option value='2012-10'>2012-10月<option value='2012-09'>2012-09月<option value='2012-05'>2012-05月<option value='2011-06'>2011-06月<option value='2010-08'>2010-08月<option value='2010-07'>2010-07月<option value='2010-06'>2010-06月<option value='2010-05'>2010-05月<option value='2010-04'>2010-04月<option value='2010-03'>2010-03月<option value='2010-01'>2010-01月<option value='2009-12'>2009-12月<option value='2009-11'>2009-11月<option value='2009-01'>2009-01月<option value='2008-12'>2008-12月<option value='2008-11'>2008-11月<option value='2008-10'>2008-10月<option value='2008-09'>2008-09月<option value='2008-08'>2008-08月<option value='2008-07'>2008-07月<option value='2008-06'>2008-06月<option value='2008-05'>2008-05月<option value='2008-01'>2008-01月<option value='1010-01'>1010-01月        </select>
        <input type=text id=fmKeyword name=fmKeyword onKeyDown='searchEnter(event)' style='width:200px' value=''>
        <input type=button onClick='search()' value="搜尋">
    </div>
    <div style='clear:both'></div>
</div>


<form name=fm_bill action='index.php' method=post>
    <table style='width: 100%'>
        <tr class=trTitle>
            <td class=tdCB><input type=checkbox ></td>
            <td class=tdDate>日期</td>
            <td class=tdFolder>分類</td>
            <td class=tdSubFolder>子分類</td>
            <td class=tdItem>物品</td>
            <td class=tdTotal>總計</td>
            <td class=tdNote>備註</td>
        </tr>
                <tr class=trFoot>
            <td class=tdCB></td>
            <td class=tdDate></td>
            <td class=tdItem></td>
            <td class=tdFolder></td>
            <td class=tdSubFolder></td>
            <td class=tdTotal>0</td>
            <td class=tdNote></td>
        </tr>
        <tr class=trBtn>
            <td class=tdBtn colspan=7>
                <input type=submit name=delRec value='刪除'>
                <input type=button name=editRec onclick='edit()' value='編輯'>
                <input type=button name=editRec onclick='editCategory()' value='設定分類'>
                <input type=button name=importRec onclick='bill_import()' value='匯入'>
            </td>
        </tr>
    </table>
</form>
</div>
    </div>
</body>
</html>
