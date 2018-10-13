
if __name__ == '__main__':
    import socket
    import json
    import time
    import pymysql

    db = pymysql.connect("localhost","LJW11688","","test" )
    cursor = db.cursor()

    sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    s=sock.bind(('',8080))
    sock.listen()
    (csock, adr) = sock.accept()
    print ("Client Info:", csock, adr)

    while True:
        str=0;
        
        str=csock.recv(1024)
        print(str.decode('utf-8'))
        if(str):
            with open('Humidity.json', 'r') as f:
                d = json.load(f)
                localtime = d['Time']
                humidity = d['Humidity']
                sql = "INSERT INTO data(Humidity, Datehum)  VALUES (%s,%s)"
                value=(humidity, localtime)
                cursor.execute(sql,value)
                db.commit()
                print(localtime, humidity)
                f.close()
            with open('Temperature.json', 'r') as f:
                d = json.load(f)
                
                localtime = d['Time']
                temperature = d['Temperature']
                sql = "INSERT INTO data(Tempurature, Datetmp)  VALUES (%s,%s)"
                value=(temperature, localtime)
                cursor.execute(sql,value)
                db.commit()
                print(localtime, temperature)
                f.close()
     
        
            

