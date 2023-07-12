qz.security.setSignaturePromise(function(toSign) {
  return function(resolve, reject) {
    HTTP.call('get', 'http://****.com/sign-message.php?request='+ toSign, function(e,r) {
      resolve(r.content);
    });
  };
});  
