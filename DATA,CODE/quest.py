if __name__ == '__main__':
    import socket
    import time   
      
    sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    sock.connect(('192.168.1.104', 8080))

    while True:
        str = '1';
        sock.send(str.encode('utf-8'))
        print('Success!!')
        time.sleep(2)
