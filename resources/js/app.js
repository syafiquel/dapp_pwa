require('./bootstrap');

import Alpine from 'alpinejs'
import Web3 from 'web3/dist/web3.min.js'

 
window.Alpine = Alpine;
window.Web3 = Web3;

window.Alpine = {
    dev: true
}
Alpine.start()

