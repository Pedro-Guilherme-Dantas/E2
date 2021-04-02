import time
import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
import mysql.connector
from matplotlib.font_manager import FontProperties
from skimage.io import imread
#-----------------------------Pandas------------------------------


def limitaGrafico(listt):
    
    aj = sorted(listt[0], key=int, reverse=True)
    ax =[]
    count = []
    cities = []
    citAge = listt[1] 
    
    for i in range (0,5):
      ax.append(aj[i])
    
     
    for i in range(0,len(citAge)):
        
        aux = infectados.loc[infectados['cidade'] == str(citAge[i])]
        if aux.shape[0] <= max(ax) and aux.shape[0] >= min(ax):
            count.append(aux.shape[0])
            cities.append(str(citiesX[i]))
        else:
            continue
    
    
    return [count, cities]




while True:

    #-------------------Médias e contagens-------------------------#
    base = pd.read_csv('dados.csv')
    
    mediaAge = round(base['idade'].mean(), 2)
    mediaAge = str(mediaAge)
    
    infectados = base.loc[base['historico_infecção'] == 'SIM']
    naoInfectados = base.loc[base['historico_infecção'] == 'NÃO']
    
    mediaInfectados = round(infectados['idade'].mean(), 2)
    mediaInfectados = mediaInfectados

    totalEntrevistados = base.shape[0]
    totalInfectados = infectados.shape[0]
    totalNaoInfectados = (int(totalEntrevistados) - totalInfectados)

    
    #-------Não vacinados que são do grupo de risco----------------#
    gpRisco = base.loc[base['grupo_de_risco'] == 'SIM']
    gpRiscoSemVacina = gpRisco.loc[gpRisco['situação_vacina'] == 'NULA']
    countGpRisco = gpRiscoSemVacina.shape[0]
    #-------Não vacinados que não são do grupo de risco------------#
    svcNormal = base.loc[base['grupo_de_risco'] == 'NÃO']
    svcNomal = svcNormal.loc[svcNormal['situação_vacina'] == 'NULA']
    svcNormal = svcNormal.shape[0]
    #-------Vacinados que são do grupo de risco--------------------#
    vacinados = base.loc[base['situação_vacina'] == 'VACINADO']
    vacinadosGpRisco = vacinados.loc[vacinados['grupo_de_risco'] == 'SIM']
    vacinadosGpRisco = vacinadosGpRisco.shape[0]
    #-------Vacinados que não são do grupo de risco----------------#
    vcnNormal = vacinados.loc[vacinados['grupo_de_risco'] == 'NÃO']
    vcnNormal = vcnNormal.shape[0]

    #-------Escrita no arquivo txt---------------------------------#
    file = open('base.txt', 'w')

    file.write(
        '''TotalInfectados->{}\nMedIdade->{}\nMedIdadeInfectados->{}\nTotal->{}'''
        .format(totalInfectados, mediaAge, mediaInfectados,totalEntrevistados)
        )

    #------Formação dos arrays para a construção dos Gráficos------#  
    arrayCities = infectados['cidade']
      
    citiesX = arrayCities.drop_duplicates()
    
    citiesX.reset_index(drop=True, inplace=True)
    countY = []
    
    
    for i in range(0,len(citiesX)):
        
        aux = infectados.loc[infectados['cidade'] == str(citiesX[i])]
        countY.append(aux.shape[0])
    
    
    
    idadesX = infectados['idade']
    idadesX = idadesX.drop_duplicates()
    idadesX.reset_index(drop=True, inplace=True)
    casosY = []
    
    for i in range(0,len(idadesX)):
        
        aux = infectados.loc[infectados['idade'] == idadesX[i]]
        casosY.append(aux.shape[0])
        idadesX[i] = str(idadesX[i])+" anos"
    
    file.close()
    
    
    #-----------------------------Matplot-------------------------------------

    
    #-------------------------Gráfico de barras horizontal--------------------
    
    plt.figure(figsize=(15, 7))
    listLimit = limitaGrafico([countY, citiesX])
    
    plt.title("Infectados por cidade")
    plt.barh(listLimit[1], listLimit[0], align='edge')
    plt.savefig('images/grafico1.png', format='png')
    
    plt.clf()
    
    #---------------------------Gráfico Pizza---------------------------------
    
    plt.title("Idades mais recorrentes")
    
    

    aj = sorted(casosY, key=int, reverse=True)
    ax = []
    cases = []
    ages = []
    
    for i in range (0,3):
      ax.append(aj[i])
    
    for i in range (0, len(idadesX)):
        if casosY[i] <= max(ax) and casosY[i] >= min(ax):
            cases.append(casosY[i])
            ages.append(idadesX[i])
        else:
            continue
        
    plt.pie(cases, labels=ages, autopct=lambda p : '{:,.0f} Casos'.format(p * sum(cases)/100))
    
    plt.savefig('images/grafico2.png', format='png')
    plt.clf()
    
    #---------------------------Gráfico do Mapa-------------------------------
    
    mydb = mysql.connector.connect(
      host="localhost",
      user="root",
      password="",
      database="db_data_covid"
    )
    
    mycursor = mydb.cursor()
    
    mycursor.execute("SELECT * FROM cidades")
    
    myresult = mycursor.fetchall()
    
    cities = []
    x = []
    y= []
    
    for i in myresult:
      cities.append(i[1])
      x.append(i[2])
      y.append(i[3])
    
    plt.title("Casos no Seridó")
    plt.rcParams["figure.figsize"] = (10,6)
    
    imagem = imread("images/baseMap.png")
    
    sizes = []
    
    for i in range(len(cities)):
        aux = infectados.loc[infectados['cidade'] == str(cities[i])]
        sizes.append(aux.shape[0]*30)
        
    
    sizes = np.array(sizes)
    
    plt.scatter(x, y, c='green', s=sizes, alpha=0.5)

    plt.imshow(imagem)
    
    plt.savefig("images/graficoMap.png", format='png')
    
    
    #---------------------------Gráfico de Barras Empilhadas------------------
    arrayGpRisco = np.array((vacinadosGpRisco, countGpRisco))
    arrayNoGpRisco = np.array((vcnNormal, svcNormal))

    resources = ['Fora do G. de Risco', 'Grupo de Risco']
    barras = ['Vacinados', 'Não Vacinados']
    plt.figure(figsize=(10, 7))
    plt.bar(barras, arrayGpRisco, color='gold')
    plt.bar(barras, arrayNoGpRisco, color='grey', bottom = arrayGpRisco)
    
    plt.xlabel = ('')
    plt.ylabel = ('Quantidade de alunos')
    plt.legend(('Grupo de Risco', 'Fora do Grupo de Risco'))
    plt.savefig('images/grafico3.png', format='png')
    plt.close()
    print ('exec')
    time.sleep(1) 










