const puppeteer =require('puppeteer');
const fs = require('fs');
 const imgList = [];

(async () => {
//   const browser = await puppeteer.launch({headless:false});
    const browser = await puppeteer.launch();
    const page = await browser.newPage();
   
    for (let index = 1; index <= 40; index++) {
        await page.goto('https://trakt.tv/users/ivobiesdorf/history/episodes/added=?genres=&page='+index);
        imgList[index] = await page.evaluate(()=>{
            const list = [...document.querySelectorAll('.titles')].map((titulo)=>({
                titulo: titulo.querySelector('.main-title').innerHTML,
                subtitulo: titulo.querySelector('h4').innerHTML,
                src: titulo.parentNode.querySelector('a').href,
                data: titulo.querySelector('span').innerHTML
            }))
            return list;
        })
        fs.writeFile('instagram'+index+'.json',JSON.stringify(imgList[index], null, 2), err => {
            if(err) throw new Error('something went wrong')
            console.log('well done!')
        })
    }
    
    await browser.close();
})();