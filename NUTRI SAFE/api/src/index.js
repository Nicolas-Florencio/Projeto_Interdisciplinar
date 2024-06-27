const express = require("express")
const mongoose = require('mongoose');
const app = express()
app.use(express.json())
const port = 3000
mongoose.connect("mongodb+srv://teste:HQabd7gV0aokjJ9o@cluster0.6f7puly.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0")
const Products= mongoose.model("Products", {id: String, name:String, description:String, imagem: String});
app.post("/products", async (req, res) => {
    const products = new Products({
        id: req.body.id,
        name: req.body.name,
        description: req.body.description,
        imagem: req.body.imagem
    })

    await products.save()
    res.send(products)
})

const User= mongoose.model("User", {name:String});
app.post("/user", async (req, res) => {
    const user = new User({
        name: req.body.name   
    })

    await user.save()
    res.send(user)
})

app.get("/", (req, res) => {
    res.send(fetch(prod))
})

app.listen(port, () => {
        console.log('App running')
})

