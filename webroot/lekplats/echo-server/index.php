<?php $title='Klient till echo-server'; include(__DIR__ . '/../mall/header.php'); ?>
 
<div id='flash'>
  <h1>Klient till en websocket echo-server</h1>
  <p>Kika gärna i konsolen...</p>

  <form id='echo-form'>
    <p>
      <label>Anslut: </label></br>
      <input id='connect_url'>
      <input id='connect' type='button' value='Anslut'>
      <input id='close' type='button' value='Avsluta anslutningen'/>
    </p>

    <p>
      <label>Skicka ett meddelande: </label></br>
      <input id='message'/>
      <input id='send_message' type='button' value='Skicka meddelande'/>
    </p>

    <label>Logg: </label>
    <div id='output' class='output'></div>
  </form>
</div>
 
<?php $path=__DIR__; include(__DIR__ . '/../mall/footer.php'); ?>