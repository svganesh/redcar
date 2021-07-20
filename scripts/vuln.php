<?php
header('X-Frame-Options: DENY');
header('X-Content-Type-Options: nosniff');
header('X-Download-Options: noopen');
header('Content-Type: text/html; charset=utf-8');
?>
<!doctype html>
<h6>A challenge by Masato, FD and .mario</h6>
<h1>The XSS Metaphor</h1>
<p>
Is it real?
<br>
Can it be?
<br>
What is the meaning of life?
<br>
Can you execute <code>alert(1)</code> in this origin?
<br>
Is the vulnerable parameter called <code>xss</code>? 
<br>
Does it matter?
</p>
<script type="text/javascript">
<?php
$_GET['xss'] = isset($_GET['xss']) ? $_GET['xss'] : '1';
?>onload=onhashchange=func;
function func(){
	try{
        <?php echo preg_replace('/[^0-9A-Za-mo-z.\[\]=]/', ' ', $_GET['xss']);?>;
		u=location.hash.slice(1);
		if(u.match(/^https?:\/\/cure53.de\//)) {
	            "/"+u.match(/\\/);
	    		location=u;
		}
	}catch(e){
	    	throw <?php echo preg_replace('/[^0-9A-Za-mo-z.\[\]=]/', ' ', $_GET['xss']);?>;
	}
}
</script>
<p>In scope are recent Chrome, Edge and Firefox browsers.
<br>
There is more than one expected solution. One easy, one hard. Experts will find both. User interaction is not required.</p>
<h2>Winners</h2>
<ol>
	<li>You?</li>
</ol>
<p>
Mail <a href="mailto:mario@cure53.de">.mario</a> or <a href="mailto:filedescriptor@cure53.de">FD</a> or <a href="mailto:masato@cure53.de">Masato</a> if you did it :)
</p>
