<?php $title='Transforms och transitions'; include(__DIR__ . '/../mall/header.php'); ?>
 
<div id='flash'>
  <p>Klicka på figurerna för <em>some action</em> - CSS3 2D transforms och CSS3 transitions.</p>
  <table>
    <tr>
      <td>Rotera x 0.5:</td>
      <td>Rotera x 1.5:</td>
      <td>Halva storleken:</td>
      <td>Dubbla storleken:</td>
      <td>Vrid horisontellt:</td>
      <td>Vrid vertikalt:</td>
      <td>Flytta:</td>
      <td>Flytta & rotera:</td>
    </tr>
    <tr>
      <td><div id='b1' class='baddie'></div></td>
      <td><div id='b2' class='baddie'></div></td>
      <td><div id='b3' class='baddie'></div></td>
      <td><div id='b4' class='baddie'></div></td>
      <td><div id='b5' class='baddie'></div></td>
      <td><div id='b6' class='baddie'></div></td>
      <td><div id='b7' class='baddie'></div></td>
      <td><div id='b8' class='baddie'></div></td>
    </tr>
  </table>
  <table>
    <tr>
      <td>Stående dubbel saltomortal framåt:</td>
    </tr>
    <tr>
      <td><div id='b-somersault' class='baddie'></div></td>
    </tr>
  </table>
</div>
 
<?php $path=__DIR__; include(__DIR__ . '/../mall/footer.php'); ?>