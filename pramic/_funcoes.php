<?php

function print_js(string $codigo)
{
    echo '<script>' . $codigo . '</script>';
}

function passa_info3($caminho, $v1, $v2, $v3)
{
    echo "<form id='p-form' method='post' action='$caminho'>
            <input type='hidden' name='id_assoc' value='$v1'>
            <input type='hidden' name='nome_assoc' value='$v2'>
            <input type='hidden' name='comunidade_assoc' value='$v3'>
        </form>
        <script>document.forms.namedItem('p-form').submit()</script>;
    ";
}
