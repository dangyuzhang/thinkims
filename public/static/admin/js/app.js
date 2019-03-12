window.app = {
    baseUrl: '/admin',
    isNotNull: function(str) {
        if (str != null && str != "" && str != undefined) {
            return true;
        }
        return false;
    },
    isNull: function(str) {
        if (str == null || str == "" || str == undefined) {
            return true;
        }
        return false;
    },
    /**
     * 获取urlval
     * @param name
     * @returns {*}
     */
    getParamVal: function (name) {
        var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if(r!=null) return  decodeURI(r[2]); return null;
    },
    /**
     *  array追加
     * @param target
     * @param source
     * @returns {*}
     */
    extend: function (target, source) {
        for (var obj in source) {
            target[obj] = source[obj];
        }
        return target;
    }
}