const express = require('express');
const mongoose = require('mongoose');
const multer = require('multer');
const path = require('path');

const app = express();
const port = 3000;

mongoose.connect('mongodb://localhost:27017/profiles', { useNewUrlParser: true, useUnifiedTopology: true });

const userSchema = new mongoose.Schema({
  username: String,
  profilePicture: String,
});

const User = mongoose.model('User', userSchema);

const upload = multer({ dest: 'uploads/' });

app.use('/uploads', express.static(path.join(__dirname, 'uploads')));

app.post('/api/profile', upload.single('profilePicture'), async (req, res) => {
  try {
    const { username } = req.body;
    const profilePicture = req.file.filename;

    const user = await User.findOneAndUpdate({ username }, { profilePicture }, { new: true });

    res.json({ success: true, user });
  } catch (error) {
    console.error(error);
    res.status(500).json({ success: false, error: 'Internal Server Error' });
  }
});

app.get('/api/profile/:username', async (req, res) => {
  try {
    const { username } = req.params;
    const user = await User.findOne({ username });
    res.json({ success: true, user });
  } catch (error) {
    console.error(error);
    res.status(500).json({ success: false, error: 'Internal Server Error' });
  }
});

app.post('/api/addPortfolioItem', async (req, res) => {
  try {
    const { title, description, imageUrl } = req.body;
    console.log(`Received new portfolio item: ${title}, ${description}, ${imageUrl}`);

    res.json({ success: true, message: 'Portfolio item added successfully' });
  } catch (error) {
    console.error(error);
    res.status(500).json({ success: false, error: 'Internal Server Error' });
  }
});

app.get('/profile', (req, res) => {
  res.sendFile(path.join(__dirname, 'profile.html'));
});

app.get('/blog', (req, res) => {
  res.sendFile(path.join(__dirname, 'blog.html'));
});

app.use((req, res) => {
  res.status(404).json({ success: false, error: 'Not Found' });
});

app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}`);
});
