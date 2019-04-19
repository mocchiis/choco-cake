#グラフの書き方
#グラフを書くときはmatplotlibの中にあるpyplotが必要

import matplotlib.pyplot as plt
import numpy as np

#サンプル
x=[-2,-1,1,2,3]
y=[4,-1,3,2,-4]
plt.plot(x,y)#グラフ作成
plt.show()#グラフ表示

t=np.arange(-180,181,1)#180以上181未満の整数列の生成
print(t)

num=t/180*np.pi#numpyの中にπを入れる
print(num)

SN=np.sin(num)#0～180までのsin関数を作成
CN=np.cos(num)#0～180までのcos関数を作成
print(SN)


#いろいろオプションをつけて表示
plt.plot(t,SN,label='sin',color='red')#labelを指定すると凡例に名前が付く#colorを指定すると色が変更できる
plt.xlabel("x",fontsize=24)#x軸の名前をグラフに指定
plt.ylabel("y",fontsize=24)
plt.xlim(-180,180)#x軸の表示域を指定
plt.ylim(-1,1)
plt.tick_params(labelsize=24)#軸のフォントサイズを変更
plt.rcParams["font.size"]=24#その他のフォントサイズを変更
plt.legend()#凡例を表示させる
plt.show()

#二つ以上のグラフを重ねるとき
plt.plot(t,SN,label='sin',color='red')#plot,show()を入れるまでの
plt.plot(t,CN,label='cos',color='blue')
plt.xlabel("x",fontsize=24)#x軸の名前をグラフに指定
plt.ylabel("y",fontsize=24)
plt.xlim(-180,180)#x軸の表示域を指定
plt.ylim(-1,1)
plt.tick_params(labelsize=24)#軸のフォントサイズを変更
plt.rcParams["font.size"]=24#その他のフォントサイズを変更
plt.legend(loc='upper right')#凡例を表示させる
plt.show()

#二つ以上のグラフを上下に並べて表示
plt.subplot(121)#211 or 121
plt.plot(t,SN,label='sin',color='red')#plot,show()を入れるまでの
plt.xlabel("x")#x軸の名前をグラフに指定
plt.ylabel("y")
plt.xlim(-180,180)#x軸の表示域を指定
plt.ylim(-1,1)
plt.legend(loc='upper right')#凡例を表示させる

plt.subplot(122)#212 or 122
plt.plot(t,CN,label='cos',color='blue')
plt.xlabel("x")#x軸の名前をグラフに指定
plt.ylabel("y")
plt.xlim(-180,180)#x軸の表示域を指定
plt.ylim(-1,1)

plt.legend(loc='lower right')#凡例を表示させる
plt.show()
