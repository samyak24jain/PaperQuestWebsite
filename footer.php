        <div id="footer">
            <p>&copy;2015 <a style="color:brown" id="footerLink" href="index.php">NITKResource.3eeweb.com</a></p>
        </div>
        <script>
            function checkPassword(pass, pass2){
                if(pass !== pass2){
                    document.getElementById('display').innerHTML = "Passwords don't match!";
                    resetForm();
                }
            }
            function resetForm(){
                document.getElementById('signupForm').reset();
            }
        </script>        
    </body>
</html>