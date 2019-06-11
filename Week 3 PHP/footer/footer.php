<div id="footer">
    </br><p>&copy; Jan Garretsen - 2019, All rights reserved.</p>
</div>
</body>
</html>
<script>
    let timer = setInterval(function() {
        var d = new Date();
        var n = d.toLocaleTimeString();

        document.getElementById("time").innerHTML = n;
    }, 1000);
</script>
