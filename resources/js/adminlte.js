window._ = require('lodash');
try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
} catch (e) {}
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

require('../../node_modules/admin-lte/bower_components/bootstrap/dist/js/bootstrap.min')
require('../../node_modules/admin-lte/bower_components/moment/moment')
require('../../node_modules/admin-lte/bower_components/select2/dist/js/select2.min')
require('../../node_modules/admin-lte/bower_components/datatables.net/js/jquery.dataTables.min')
require('../../node_modules/admin-lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min')
require('../../node_modules/admin-lte/bower_components/bootstrap-daterangepicker/daterangepicker')
require('../../node_modules/admin-lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min')
require('../../node_modules/admin-lte/bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.id.min')
require('../../node_modules/admin-lte/bower_components/inputmask/dist/jquery.inputmask.bundle')
//require('../../node_modules/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min')
require('../../node_modules/admin-lte/plugins/iCheck/icheck.min')
require('../../node_modules/admin-lte/dist/js/adminlte.min')
