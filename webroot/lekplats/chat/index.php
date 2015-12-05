<?php $title='Chat'; include(__DIR__ . '/../mall/header.php'); ?>
 
<div id='flash'>
  <form id='chat-form'>
    <div id='notconnected' class='hidden'>
      <h1>Välkommen!</h1>
      <p>
        Ange ditt chattnamn för att ansluta till servern.
      </p>
      <input type='text' id='nick' placeholder='Ange chattnamn'>
      <input type='button' id='login' value='Anslut'>
    </div>
    <div id='connected'>
      <div>
        <div id='output'>
          <p>
            <strong>Välkommen till chatten!</strong>
          </p>
        </div>
        <div id='guests'></div>
      </div>
      <input type='text' id='txt' disabled='true' autocomplete='off' >
    </div>
  </form>
</div>
 
<?php $path=__DIR__; include(__DIR__ . '/../mall/footer.php'); ?>