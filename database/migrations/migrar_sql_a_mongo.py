import pymysql
import pymongo
import json

def get_mysql_data(mysql_connection):
    """Obtiene los datos de todas las tablas de la base de datos MySQL"""
    cursor = mysql_connection.cursor()
    cursor.execute("SHOW TABLES")  # Obtiene todas las tablas de la base de datos MySQL
    tables = cursor.fetchall()
    data = {}

    for table in tables:
        table_name = table[0]
        cursor.execute(f"SELECT * FROM {table_name}")  # Obtiene todos los datos de la tabla
        rows = cursor.fetchall()
        
        # Obtener los nombres de las columnas
        columns = [desc[0] for desc in cursor.description]
        
        # Crear un diccionario de los datos
        data[table_name] = [dict(zip(columns, row)) for row in rows]
    
    cursor.close()
    return data

def main():
    # Conectar a MySQL
    mysql_connection = pymysql.connect(
        host="127.0.0.1",         
        user="root",              
        password="",              
        database="db_inventory"  
    )

    # Conectar a MongoDB
    client = pymongo.MongoClient("mongodb://localhost:27017/")
    db = client["dbinventory"]  # Base de datos MongoDB

    # Obtener los datos de MySQL
    mysql_data = get_mysql_data(mysql_connection)

    # Migrar los datos a MongoDB
    for table_name, data in mysql_data.items():
        try:
            # Verificar si la colección ya existe
            collection = db[table_name]
            if collection.count_documents({}) > 0:  # Si la colección tiene documentos
                print(f"La colección '{table_name}' ya existe y tiene documentos.")
            else:
                if data:  # Si hay datos, insertarlos
                    collection.insert_many(data)
                    print(f"Datos insertados en la colección '{table_name}': {len(data)} documentos.")
                else:  # Si no hay datos, solo crear la colección vacía sin insertar documentos
                    print(f"La colección '{table_name}' fue creada vacía.")
        
        except pymysql.MySQLError as e:
            print(f"Error en la conexión o consulta de MySQL: {e}")
        except pymongo.errors.PyMongoError as e:
            print(f"Error en la inserción a MongoDB: {e}")
        except Exception as e:
            print(f"Error inesperado en la colección '{table_name}': {e}")

    mysql_connection.close()
    print("Migración completada.")

if __name__ == "__main__":
    main()