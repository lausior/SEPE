function verificar(email) {
    const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,}(?:\.[a-zA-Z]{2,})*$/;

    console.log(email, regex.test(email));
}
verificar("laurayo");//no
verificar("laura@hotmail.com");//si
verificar("@laura@hola.com");//no
verificar("laura@yo");//no
verificar("laura@.com");//no
verificar("laura@y.a");//no
verificar("laura@yo.com.net");//si