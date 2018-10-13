if __name__ == '__main__':
    import socket
    import json
    import time
    sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    sock.connect(('192.168.1.107', 5055))
    
    import time

    print('sended')
    
    while True:
        time.sleep(0.5)
        str = sock.recv(34)
        data = str.decode("utf-8")
        control = True
        tmp = ' '
        hum = ' '
        for index in range(len(data)) :
            if data[index] == 'n' :
                control = False
                break
        if control == False:
            continue
        for index in range(len(data)) :
            if index >5 and data[index] == '%':
                hum= data[index-6:index-1]
            if index >6 and data[index] == 'C':
                tmp= data[index-7:index-2]
        if hum != ' ':
            localtime = time.asctime(time.localtime(time.time()))
            hum = {"Time":localtime ,"Humidity":hum}
            print(hum)
            with open('Humidity.json','w') as fout:
                json.dump(hum,fout, indent = 2);
        if tmp != ' ':
            localtime = time.asctime(time.localtime(time.time()))
            tmp = {"Time":localtime,"Temperature":tmp}
            print(tmp)
            with open('Temperature.json','w') as fout:
                json.dump(tmp,fout, indent = 2);
    sock.close()
