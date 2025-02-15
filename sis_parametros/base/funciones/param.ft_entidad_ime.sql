CREATE OR REPLACE FUNCTION "param"."ft_entidad_ime" (	
				p_administrador integer, p_id_usuario integer, p_tabla character varying, p_transaccion character varying)
RETURNS character varying AS
$BODY$

/**************************************************************************
 SISTEMA:		Parametros Generales
 FUNCION: 		param.ft_entidad_ime
 DESCRIPCION:   Funcion que gestiona las operaciones basicas (inserciones, modificaciones, eliminaciones de la tabla 'param.tentidad'
 AUTOR: 		 (admin)
 FECHA:	        20-09-2015 19:11:44
 COMENTARIOS:	
***************************************************************************
 HISTORIAL DE MODIFICACIONES:

 DESCRIPCION:	
 AUTOR:			
 FECHA:		
***************************************************************************/

DECLARE

	v_nro_requerimiento    	integer;
	v_parametros           	record;
	v_id_requerimiento     	integer;
	v_resp		            varchar;
	v_nombre_funcion        text;
	v_mensaje_error         text;
	v_id_entidad	integer;
			    
BEGIN

    v_nombre_funcion = 'param.ft_entidad_ime';
    v_parametros = pxp.f_get_record(p_tabla);

	/*********************************    
 	#TRANSACCION:  'PM_ENT_INS'
 	#DESCRIPCION:	Insercion de registros
 	#AUTOR:		admin	
 	#FECHA:		20-09-2015 19:11:44
	***********************************/

	if(p_transaccion='PM_ENT_INS')then
					
        begin
        	--Sentencia de la insercion
        	insert into param.tentidad(
			tipo_venta_producto,
			nit,
			estado_reg,
			nombre,
			id_usuario_ai,
			id_usuario_reg,
			fecha_reg,
			usuario_ai,
			id_usuario_mod,
			fecha_mod,
			estados_comprobante_venta,
			estados_anulacion_venta
          	) values(
			v_parametros.tipo_venta_producto,
			v_parametros.nit,
			'activo',
			v_parametros.nombre,
			v_parametros._id_usuario_ai,
			p_id_usuario,
			now(),
			v_parametros._nombre_usuario_ai,
			null,
			null,
			v_parametros.estados_comprobante_venta,
			v_parametros.estados_anulacion_venta
							
			
			
			)RETURNING id_entidad into v_id_entidad;
			
			--Definicion de la respuesta
			v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Entidad almacenado(a) con exito (id_entidad'||v_id_entidad||')'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_entidad',v_id_entidad::varchar);

            --Devuelve la respuesta
            return v_resp;

		end;

	/*********************************    
 	#TRANSACCION:  'PM_ENT_MOD'
 	#DESCRIPCION:	Modificacion de registros
 	#AUTOR:		admin	
 	#FECHA:		20-09-2015 19:11:44
	***********************************/

	elsif(p_transaccion='PM_ENT_MOD')then

		begin
			--Sentencia de la modificacion
			update param.tentidad set
			tipo_venta_producto = v_parametros.tipo_venta_producto,
			nit = v_parametros.nit,
			nombre = v_parametros.nombre,
			id_usuario_mod = p_id_usuario,
			fecha_mod = now(),
			id_usuario_ai = v_parametros._id_usuario_ai,
			usuario_ai = v_parametros._nombre_usuario_ai,
			estados_comprobante_venta = v_parametros.estados_comprobante_venta,
			estados_anulacion_venta = v_parametros.estados_anulacion_venta
			where id_entidad=v_parametros.id_entidad;
               
			--Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Entidad modificado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_entidad',v_parametros.id_entidad::varchar);
               
            --Devuelve la respuesta
            return v_resp;
            
		end;

	/*********************************    
 	#TRANSACCION:  'PM_ENT_ELI'
 	#DESCRIPCION:	Eliminacion de registros
 	#AUTOR:		admin	
 	#FECHA:		20-09-2015 19:11:44
	***********************************/

	elsif(p_transaccion='PM_ENT_ELI')then

		begin
			--Sentencia de la eliminacion
			delete from param.tentidad
            where id_entidad=v_parametros.id_entidad;
               
            --Definicion de la respuesta
            v_resp = pxp.f_agrega_clave(v_resp,'mensaje','Entidad eliminado(a)'); 
            v_resp = pxp.f_agrega_clave(v_resp,'id_entidad',v_parametros.id_entidad::varchar);
              
            --Devuelve la respuesta
            return v_resp;

		end;
         
	else
     
    	raise exception 'Transaccion inexistente: %',p_transaccion;

	end if;

EXCEPTION
				
	WHEN OTHERS THEN
		v_resp='';
		v_resp = pxp.f_agrega_clave(v_resp,'mensaje',SQLERRM);
		v_resp = pxp.f_agrega_clave(v_resp,'codigo_error',SQLSTATE);
		v_resp = pxp.f_agrega_clave(v_resp,'procedimientos',v_nombre_funcion);
		raise exception '%',v_resp;
				        
END;
$BODY$
LANGUAGE 'plpgsql' VOLATILE
COST 100;
ALTER FUNCTION "param"."ft_entidad_ime"(integer, integer, character varying, character varying) OWNER TO postgres;
