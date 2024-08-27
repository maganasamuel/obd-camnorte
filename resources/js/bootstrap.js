import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import 'preline';

import Gumshoe from 'gumshoejs';
window.Gumshoe = Gumshoe;
