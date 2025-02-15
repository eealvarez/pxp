<?php
/**
*@package pXP
*@file Plantilla.php
*@author  Gonzalo Sarmiento Sejas
*@date 01-04-2013 21:49:11
*@description Archivo con la interfaz de usuario que permite la ejecucion de todas las funcionalidades del sistema
*/

header("content-type: text/javascript; charset=UTF-8");
?>
<script>
Phx.vista.Plantilla=Ext.extend(Phx.gridInterfaz,{

	constructor:function(config){
		this.maestro=config.maestro;
    	//llama al constructor de la clase padre
		Phx.vista.Plantilla.superclass.constructor.call(this,config);
		this.init();
		this.load({params:{start:0, limit:this.tam_pag}})
	},
	tam_pag:50,
			
	Atributos:[
		{
			//configuracion del componente
			config:{
					labelSeparator:'',
					inputType:'hidden',
					name: 'id_plantilla'
			},
			type:'Field',
			form:true 
		},
		{
			config:{
				name: 'desc_plantilla',
				fieldLabel: 'Desc Plantilla',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:255
			},
			type:'TextField',
			filters:{pfiltro:'plt.desc_plantilla',type:'string'},
			id_grupo:1,
			grid:true,
			form:true
		},
        
        {
            config:{
                name: 'sw_tesoro',
                fieldLabel: 'Sw Tesoro',
                qtip: 'Se admite en documentos de tesoreria',
                allowBlank: false,
                anchor: '40%',
                gwidth: 80,
                typeAhead: true,
                triggerAction: 'all',
                lazyRender: true,
                mode: 'local',
                store: ['si','no']
            },
            type:'ComboBox',
            id_grupo:1,
            filters:{   pfiltro:'plt.sw_tesoro',
                        type: 'list',
                         options: ['si','no']  
                    },
            grid:true,
            egrid: true,
            form:true
       },
		{
            config:{
                name: 'sw_compro',
                fieldLabel: 'Sw Compro',
                qtip: 'Se admite en documentos de adquisiciones',
                allowBlank: false,
                anchor: '40%',
                gwidth: 80,
                typeAhead: true,
                triggerAction: 'all',
                lazyRender: true,
                mode: 'local',
                store: ['si','no']
            },
            type:'ComboBox',
            id_grupo:1,
            filters:{   pfiltro:'plt.sw_compro',
                        type: 'list',
                         options: ['si','no']  
                    },
            grid:true,
            egrid: true,
            form:true
       },
        
        {
            config:{
                name: 'sw_monto_excento',
                fieldLabel: 'Excento',
                qtip: 'El documento admite monto excento',
                allowBlank: false,
                anchor: '40%',
                gwidth: 80,
                typeAhead: true,
                triggerAction: 'all',
                lazyRender: true,
                mode: 'local',
                store: ['si','no']
            },
            type:'ComboBox',
            id_grupo:1,
            filters:{   pfiltro:'plt.sw_monto_excento',
                        type: 'list',
                         options: ['si','no']  
                    },
            grid:true,
            egrid: true,
            form:true
       },
        
        {
            config:{
                name: 'sw_descuento',
                fieldLabel: 'Decuento',
                qtip: 'Incluye o no el campo descuento en libro de compras y ventas',
                allowBlank: false,
                anchor: '40%',
                gwidth: 80,
                typeAhead: true,
                triggerAction: 'all',
                lazyRender: true,
                mode: 'local',
                store: ['si','no']
            },
            type:'ComboBox',
            id_grupo:1,
            filters:{   pfiltro:'plt.sw_descuento',
                        type: 'list',
                         options: ['si','no']  
                    },
            grid:true,
            egrid: true,
            form:true
       },
        
        {
            config:{
                name: 'sw_autorizacion',
                fieldLabel: 'Autorización',
                qtip: 'Incluye o no el campo autorización en libro de compras y ventas',
                allowBlank: false,
                anchor: '40%',
                gwidth: 80,
                typeAhead: true,
                triggerAction: 'all',
                lazyRender: true,
                mode: 'local',
                store: ['si','no']
            },
            type:'ComboBox',
            id_grupo:1,
            filters:{   pfiltro:'plt.sw_autorizacion',
                        type: 'list',
                         options: ['si','no']  
                    },
            grid:true,
            egrid: true,
            form:true
       },
        
        {
            config:{
                name: 'sw_codigo_control',
                fieldLabel: 'Código de Control',
                qtip: 'Incluye o no el campo código de control en libro de compras y ventas',
                allowBlank: false,
                anchor: '40%',
                gwidth: 80,
                typeAhead: true,
                triggerAction: 'all',
                lazyRender: true,
                mode: 'local',
                store: ['si','no']
            },
            type:'ComboBox',
            id_grupo:1,
            filters:{   pfiltro:'plt.sw_codigo_control',
                        type: 'list',
                         options: ['si','no']  
                    },
            grid:true,
            egrid: true,
            form:true
       },
        
        {
            config:{
                name: 'sw_ic',
                fieldLabel: 'ICE',
                qtip: 'Impuesto ICE , si esta habilitado es necesario habilitar el monto excento',
                allowBlank: false,
                anchor: '40%',
                gwidth: 80,
                typeAhead: true,
                triggerAction: 'all',
                lazyRender: true,
                mode: 'local',
                store: ['si','no']
            },
            type:'ComboBox',
            id_grupo:1,
            filters:{   pfiltro:'plt.sw_ic',
                        type: 'list',
                         options: ['si','no']  
                    },
            grid:true,
            egrid: true,
            form:true
       },
        
        {
            config:{
                name: 'sw_nro_dui',
                fieldLabel: 'Nro DUI',
                qtip: 'Para polizas de importación',
                allowBlank: false,
                anchor: '40%',
                gwidth: 80,
                typeAhead: true,
                triggerAction: 'all',
                lazyRender: true,
                mode: 'local',
                store: ['si','no']
            },
            type:'ComboBox',
            id_grupo:1,
            filters:{   pfiltro:'plt.sw_nro_dui',
                        type: 'list',
                         options: ['si','no']  
                    },
            grid:true,
            egrid: true,
            form:true
       },
        
        {
            config:{
                name: 'tipo_plantilla',
                fieldLabel: 'Tipo Plantilla',
                qtip: 'Se usa para compras o para ventas',
                allowBlank: false,
                anchor: '40%',
                gwidth: 80,
                typeAhead: true,
                triggerAction: 'all',
                lazyRender: true,
                mode: 'local',
                store: ['compra','venta']
            },
            type:'ComboBox',
            id_grupo:1,
            filters:{   pfiltro:'plt.tipo_plantilla',
                        type: 'list',
                         options: ['compra','venta']  
                    },
            grid: true,
            egrid: true,
            form: true
       },
		
		{
			config:{
				name: 'nro_linea',
				fieldLabel: 'Nro Linea',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:131072
			},
			type:'NumberField',
			filters:{pfiltro:'plt.nro_linea',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'tipo',
				fieldLabel: 'Tipo',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:65536
			},
			type:'NumberField',
			filters:{pfiltro:'plt.tipo',type:'numeric'},
			id_grupo:1,
			grid:true,
			form:true
		},
		{
			config:{
				name: 'estado_reg',
				fieldLabel: 'Estado Reg.',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:10
			},
			type:'TextField',
			filters:{pfiltro:'plt.estado_reg',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'fecha_reg',
				fieldLabel: 'Fecha creación',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
						format: 'd/m/Y', 
						renderer:function (value,p,record){return value?value.dateFormat('d/m/Y H:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'plt.fecha_reg',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'usr_reg',
				fieldLabel: 'Creado por',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'usu1.cuenta',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'fecha_mod',
				fieldLabel: 'Fecha Modif.',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
						format: 'd/m/Y', 
						renderer:function (value,p,record){return value?value.dateFormat('d/m/Y H:i:s'):''}
			},
			type:'DateField',
			filters:{pfiltro:'plt.fecha_mod',type:'date'},
			id_grupo:1,
			grid:true,
			form:false
		},
		{
			config:{
				name: 'usr_mod',
				fieldLabel: 'Modificado por',
				allowBlank: true,
				anchor: '80%',
				gwidth: 100,
				maxLength:4
			},
			type:'NumberField',
			filters:{pfiltro:'usu2.cuenta',type:'string'},
			id_grupo:1,
			grid:true,
			form:false
		}
	],
	
	title:'Plantilla Documento',
	ActSave:'../../sis_parametros/control/Plantilla/insertarPlantilla',
	ActDel:'../../sis_parametros/control/Plantilla/eliminarPlantilla',
	ActList:'../../sis_parametros/control/Plantilla/listarPlantilla',
	id_store:'id_plantilla',
	fields: [
		{name:'id_plantilla', type: 'numeric'},
		{name:'estado_reg', type: 'string'},
		{name:'desc_plantilla', type: 'string'},
		{name:'sw_tesoro', type: 'string'},
		{name:'sw_compro', type: 'string'},
		{name:'nro_linea', type: 'numeric'},
		{name:'tipo', type: 'numeric'},
		{name:'fecha_reg', type: 'date',dateFormat:'Y-m-d H:i:s.u'},
		{name:'id_usuario_reg', type: 'numeric'},
		{name:'fecha_mod', type: 'date',dateFormat:'Y-m-d H:i:s.u'},
		{name:'id_usuario_mod', type: 'numeric'},
		{name:'usr_reg', type: 'string'},
		{name:'usr_mod', type: 'string'},'sw_monto_excento',
		'sw_descuento' ,'sw_autorizacion','sw_codigo_control','tipo_plantilla',
		'sw_nro_dui','sw_ic'
		
	],
	sortInfo:{
		field: 'id_plantilla',
		direction: 'ASC'
	},
	bdel:(Phx.CP.config_ini.sis_integracion=='ENDESIS')?false:true,
    bsave:(Phx.CP.config_ini.sis_integracion=='ENDESIS')?false:true,
    //bnew:(Phx.CP.config_ini.sis_integracion=='ENDESIS')?false:true,
    //bedit:(Phx.CP.config_ini.sis_integracion=='ENDESIS')?false:true,
	
})
</script>
		
		