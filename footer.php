<!-- Start footer -->
<footer id="footer-container" class="enable_footer_columns_dark">
<?php
get_template_part('inc/misc/section-footersub');
?>    
</footer>
<!-- End footer -->
</div>
</div>
<?php wp_footer();?>
<script>
(function ($) {
    var jlCookies = {
        setCookie: function setCookie(key, value, time, path) {
            var expires = new Date();
            expires.setTime(expires.getTime() + time);
            var pathValue = '';
            if (typeof path !== 'undefined') {
                pathValue = 'path=' + path + ';';
            }
            document.cookie = key + '=' + value + ';' + pathValue + 'expires=' + expires.toUTCString();
        },
        getCookie: function getCookie(key) {
            var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
            return keyValue ? keyValue[2] : null;
        }
    };
      const serverUrl = "<?php echo get_theme_mod('serverurl', 'https://glohg3luoy5d.usemoralis.com:2053/server');?>";
      const appId = "<?php echo get_theme_mod('appid', 'bisC9l1uzYu16V34xG3a9AKV3sIMVFJkXxH0pxlE');?>";

      Moralis.start({ serverUrl, appId });

        
        async function upload(){
        let user = Moralis.User.current();        
        const fileInput = document.getElementById('file')
        const titleInput = document.getElementById('title')
        const form = document.getElementById("new_image");
        const data = fileInput.files[0]
        if( titleInput.value == '' ){
            titleInput.classList.add("jl_error_input");            

        }else{
            titleInput.classList.remove("jl_error_input");
        }        
        if( fileInput.files.length == 0 ){
            fileInput.classList.add("jl_error_file");
            return;
        }
            const file = new Moralis.File(data.name, data)
            document.getElementById("jl_up_wrap").style.display = "flex";
            await file.saveIPFS();
            document.getElementById('cus_uid').value = user.id;
            document.getElementById('cus_ipfs').value = file.ipfs();
            document.getElementById('cus_hash').value = file.hash();
            console.log(file.ipfs());
            console.log(file.hash());
            form.submit();            
        }

        async function login(){
            let user = Moralis.User.current();        
            Moralis.authenticate({signingMessage:"Login to Galstock"}).then(function (user) {
              console.log(Moralis.User.current());
              document.getElementById('login_info').innerHTML = user.id;
              jlCookies.setCookie('jlmode_dn', user.id, 1825000, '/');

              // 3650000 1h
              // 60833 1min
            })
        }
    
        async function check(){        
        let user = Moralis.User.current();        
        if(await Moralis.User.current()){
            // cus_title.style.display = 'flex';
            console.log("logged in user:", user);            
        }else{

        }
        }
        check();

        if (document.getElementById('upload_file_button') !=null){
        document.getElementById('upload_file_button').onclick = upload;
        }
        if (document.getElementById('btn-login') !=null){
        document.getElementById('btn-login').onclick = login;
        }
}(jQuery));
    </script>
</body>
</html>