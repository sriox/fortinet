"use strict";

var excelUtil = {
    _filters: {},
    setFilter: function(name, val){
        this._filters[name] = val;
    },
    getFilters: function(){
        return this._filters;
    }
};