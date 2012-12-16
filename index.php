<html>
<head>
<title>DJ Queue</title>
<script language="javascript" src="ajax_framework.js"></script>
</head>
<body>
<h2>Ajax Search Engine</h2>

<form id="searchForm" name="searchForm" method="post" action="javascript:insertTask();">
<div class="searchInput">
<input name="searchq" type="text" id="searchq" size="30" onkeyup="javascript:searchNameq()"/>
<input type="button" name="submitSearch" id="submitSearch" value="Search" onclick="javascript:searchNameq()"/>
</div>
</form>

<h3>Search Results</h3>
<div id="msg">Type something into the input field</div>
<div id="search-result"></div>
</body>
</html>
