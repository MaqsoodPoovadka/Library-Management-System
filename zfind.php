<p> hello world, hello world, hello world, hello world</p>

<!--BEGIN SEARCH BOX -->

<div class="search_box">
    <form action="" id="form2">
        <div>
            <input type="text" id="search">
            <input type="button" id="submit_form" onclick="checkInput()" value="Submit">
        </div>
    </form>
</div>
<p>uj</p>

<!--END SEARCH BOX -->
<script>
    function checkInput() {
        var query = document.getElementById('search').value;
        window.find(query);
        return true;
    }
</script>